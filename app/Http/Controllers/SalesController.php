<?php

namespace App\Http\Controllers;

use App\Client;
use App\Package;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index() 
    {
    	//$packages = Package::groupBy('client_id')
				//->selectRaw('sum(price) as totalPrice, client_id, count(client_id) as totalPackages')
				//->get();
		
	 	//$packages = Package::selectRaw('MONTH(created_at) as month, sum(price) as totalPrice')
   			//	->groupBy('month')
     			//->whereYear('created_at', '=', date('Y'))
	 		    //->get();
		 //dd($packages->toArray());
		
		
		$clients = Client::with('packages')->whereHas('packages')->get();
		
		/*$clients = Client::whereHas('packages', function($query){
			$query->where('created_at', '>=', '2019-10-08 17:46:19');
		})->get();*/
    	return view('sales.index', ['clients' => $clients]);
    }
}
