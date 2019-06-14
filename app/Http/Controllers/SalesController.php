<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index() 
    {
    	$packages = Package::groupBy('client_id')
				   ->selectRaw('sum(price) as totalPrice, client_id, count(client_id) as totalPackages')
				   ->get();

    	return view('sales.index', ['packages' => $packages]);
    }
}
