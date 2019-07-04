<?php

namespace App\Http\Controllers;

use Excel;
use App\Client;
use App\Package;
use Illuminate\Http\Request;
use App\Exports\PackagesExport;
use App\Http\Requests\PackageRequest;

class PackageController extends Controller
{
	protected $clients;
 
    public function __construct()
    {
        $this->clients = Client::orderBy('firstname', 'ASC')->get()->pluck('full_name', 'id')->toArray();
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$packages = Package::with('client')->get();
        $filterQuery = '';
		return view('packages.index', ['packages' => $packages, 'filterQuery' => $filterQuery]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('packages.create', ['clients' => $this->clients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
		$input = $request->all();
        $Package = Package::create($input);
		
		if(!$request->get('has_flight_ticket'))
            $input['has_flight_ticket'] = 0;
		
		if(!$request->get('has_visa'))
            $input['has_visa'] = 0;
		
		if(!$request->get('has_train'))
            $input['has_train'] = 0;
		
		if(!$request->get('has_hotel'))
            $input['has_hotel'] = 0;
		
		if(!$request->get('has_cruise'))
            $input['has_cruise'] = 0;
		
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('packages.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
        return view('packages.show', ['package' => $package]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('packages.edit', [ 'package' => $package, 'clients' => $this->clients ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, Package $package)
    {
		$input = $request->all();
		
        if(!$request->get('has_flight_ticket'))
            $input['has_flight_ticket'] = 0;
		
		if(!$request->get('has_visa'))
            $input['has_visa'] = 0;
		
		if(!$request->get('has_train'))
            $input['has_train'] = 0;
		
		if(!$request->get('has_hotel'))
            $input['has_hotel'] = 0;
		
		if(!$request->get('has_cruise'))
            $input['has_cruise'] = 0;
		
        $package->update($input);
		
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        $package->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('packages.index'));
    }
	
	public function export(Request $request)
    {
        $export = new PackagesExport($request->all());
        return Excel::download($export, 'packages.xlsx');
    }

    public function filter()
    {
        return view('packages.filter', ['clients' => $this->clients]);
    }

    public function doFilter(Request $request)
    {
        $packageQuery = Package::query();

        if($request->get('client_id'))
            $packageQuery->where('client_id', $request->get('client_id'));

        if($request->has('has_hotel'))
            $packageQuery->where('has_hotel', 1);

        if($request->has('has_flight_ticket'))
            $packageQuery->where('has_flight_ticket', 1);

        if($request->has('has_visa'))
            $packageQuery->where('has_visa', 1);

        if($request->has('has_cruise'))
            $packageQuery->where('has_cruise', 1);

        if($request->has('has_train'))
            $packageQuery->where('has_train', 1);

        if($request->from)
            $packageQuery->where('from', '>=', $request->from);

        if($request->to)
            $packageQuery->where('to', '<=', $request->to);

        if($request->min_price)
            $packageQuery->where('price', '>=', $request->min_price);

        if($request->max_price)
            $packageQuery->where('price', '<=', $request->max_price);

        $packages = $packageQuery->get();

       // dd($request->all());

        $filterQuery = http_build_query($request->except('_token'));
        return view('packages.index', ['packages' => $packages, 'filterQuery' => $filterQuery]);
    }
}
