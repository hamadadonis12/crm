<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class EliasController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wwt.create');
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
		
		if ($request->avatar) {
            $ext = $request->file('avatar')->getClientOriginalExtension();
            $client
                ->addMedia($request->avatar)
                ->setFileName("client-avatar".$client->id.'.'.$ext)
                ->toMediaCollection('client-avatar');
        }
		
		if ($request->image) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $client
                ->addMedia($request->image)
                ->setFileName("client-".$client->id.'.'.$ext)
                ->toMediaCollection('client');
        }
        
		session()->flash('message', 'Your Record has been Added Successfully Thank you.');
		return redirect()->back();
    }
}
