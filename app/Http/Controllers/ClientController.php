<?php

namespace App\Http\Controllers;

use Auth;
use Excel;
use Notification;
use App\Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Exports\ClientsExport;
use App\Http\Requests\ClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Notifications\ClientBirth;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::all();
		return view('clients.index', ['clients' => $clients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $client = Client::create($request->all());
		
		//Add Image
        if ($request->image) {
            $client->addMedia($request->image)->toMediaCollection('client');
        }
		
		//Notification Birth
		$date = Carbon::today();
		$fromDate = Carbon::parse($date)->format('Y-m-d');

		if($request->date_of_birth == $fromDate){
            $user = Auth::user();
            Notification::send($user, new ClientBirth);
        }
        
		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('clients.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', ['client' => $client]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, Client $client)
    {
        if($request->has('delete_existing_image'))
            $client->clearMediaCollection('client');
        
        if (isset($request->image)) {
            $client->addMedia($request->image)->toMediaCollection('client');
        }
		$client->update($request->all());
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        $client->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('clients.index'));
    }

    public function export()
    {
        $export = new ClientsExport();
        return Excel::download($export, 'clients.xlsx');
    }
}
