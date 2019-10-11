<?php

namespace App\Http\Controllers;

use DB;
use App\Client;
use App\Package;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index() 
    {
  //   	$packages = Package::selectRaw('MONTH(created_at) as month, sum(price) as totalPrice')
  //   				->groupBy('month')
  //   				->whereYear('created_at', '=', date('Y'))
		// 		   ->get();
		
		// dd($packages->toArray());
		
		$clients = Client::with('packages')->get();
    	return view('sales.index', ['clients' => $clients]);
    }
}
