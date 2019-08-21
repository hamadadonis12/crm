<?php

namespace App\Http\Controllers;

use App\City;
use App\Country; 
use Illuminate\Http\Request;
use App\Http\Requests\CityRequest;

class CityController extends Controller
{
	protected $countries;
 
    public function __construct()
    {
        $this->countries = Country::orderBy('name', 'ASC')->pluck('name', 'code')->toArray();
    }
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::with('country')->get();
		return view('cities.index', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cities.create', ['countries' => $this->countries]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        City::create($request->all());
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('cities.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(Package $package)
    {
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        return view('cities.edit', [ 'city' => $city, 'countries' => $this->countries ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, City $city)
    {
		$input = $request->all();	
        $city->update($input);

		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('cities.index'));
    }
}
