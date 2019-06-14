<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UpdateUserRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
		return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {		
		$input = $request->all();
        $input['password'] = Hash::make($request->get('password'));
        $user = User::create($input);
        
        if(!$request->get('is_active'))
            $input['is_active'] = 0;
		
		//Add Image
        if ($request->avatar) {
            $user->addMedia($request->avatar)->toMediaCollection('avatars');
        }

		session()->flash('message', 'Your record has been added successfully');
		return redirect(route('users.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request, User $user)
    {  
		$input = $request->all();
        if(!$request->get('password'))
            $input['password'] = $user->password;
        else
            $input['password'] = Hash::make($request->get('password'));
        
        if(!$request->get('is_active'))
            $input['is_active'] = 0;
		
		//Delete Image
		if($request->has('delete_existing_image'))
            $user->clearMediaCollection('avatars');
		
        //Update Image
        if (isset($request->avatar)) {
            $user->addMedia($request->avatar)->toMediaCollection('avatars');
        }
        
        $user->update($input);
        
		session()->flash('message', 'Your record has been updated successfully');
		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
		session()->flash('message', 'Your record has been deleted successfully');
		return redirect(route('users.index'));
    }
}
