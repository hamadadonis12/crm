<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\User;
use App\Client;
use App\Package;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
		$usersCount =  User::count();
        $clientCount = Client::count();
		$packageCount = Package::count();
        $packageSum = number_format( Package::sum('price'), 2, '.', ",");

        return view('home', [
            'usersCount' => $usersCount,
            'clientCount' => $clientCount,
			'packageCount' => $packageCount,
            'packageSum' => $packageSum,
        ]);
		
        return view('home');
    }
	

}
