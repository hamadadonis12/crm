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

		$packages = Package::selectRaw('MONTH(created_at) as month, sum(price) as totalPrice')
					->groupBy('month')
					->whereYear('created_at', '=', date('Y'))
					->get();
		
		 $labels = $packages->pluck('month')->map(function ($item, $key) {
                return date('F', mktime(0, 0, 0, $item, 10));
            })->toArray();
			

        return view('home', [
            'usersCount' => $usersCount,
            'clientCount' => $clientCount,
			'packageCount' => $packageCount,
            'packageSum' => $packageSum,
			'packages' => $packages,
			'labels' => $labels
        ]);
		
        return view('home');
    }
	

}
