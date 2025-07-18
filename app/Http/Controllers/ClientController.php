<?php

namespace App\Http\Controllers;

use PDF;
use DB;
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
use App\Notifications\PassportExpiry;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cache;
use App\Mail\BirthdayWishMail;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request)
    {
        $clientQuery = Client::orderBy('id', 'ASC');
		$filterQuery = http_build_query($request->except('_token')); //for the export

       // if($request->has('type'))
          //  $clientQuery->where('type', $request->type);

        if($request->fullname)
            $clientQuery->where('fullname', $request->fullname);

		if($request->gender)
            $clientQuery->where('gender', $request->gender);

		if($request->date_of_birth)
            $clientQuery->where('date_of_birth', $request->date_of_birth);

		if($request->email)
            $clientQuery->where('email', $request->email);

		if($request->mobile)
            $clientQuery->where('mobile', $request->mobile);

		if($request->company)
            $clientQuery->where('company', $request->company);

		if($request->type)
            $clientQuery->where('type', $request->type);

		if($request->country)
            $clientQuery->where('country', $request->country);


        $clients = $clientQuery->paginate(25);

       if ($request->ajax()) {
			return view('clients.pagination_data', compact('clients'));
       }

		return view('clients.index', ['clients' => $clients, 'filterQuery' => $filterQuery]);
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

		//Add Avatar
        /*if ($request->avatar) {
            $client->addMedia($request->avatar)->toMediaCollection('client-avatar');
        }*/
		if ($request->avatar) {
            $ext = $request->file('avatar')->getClientOriginalExtension();
            $client
                ->addMedia($request->avatar)
                ->setFileName("client-avatar".$client->id.'.'.$ext)
                ->toMediaCollection('client-avatar');
        }

		//Add Passport
        /*if ($request->image) {
            $client->addMedia($request->image)->toMediaCollection('client');
        }*/

		if ($request->image) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $client
                ->addMedia($request->image)
                ->setFileName("client-".$client->id.'.'.$ext)
                ->toMediaCollection('client');
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
    /*public function show(Client $client, $slug)
    {
        return view('clients.show', ['client' => $client]);
    }*/

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
        if($request->has('delete_existing_avatar'))
            $client->clearMediaCollection('client-avatar');

		if($request->has('delete_existing_image'))
            $client->clearMediaCollection('client');

		if (isset($request->avatar)) {
            $ext = $request->file('avatar')->getClientOriginalExtension();
            $client
                ->addMedia($request->avatar)
                ->setFileName("client-avatar".$client->id.'.'.$ext)
                ->toMediaCollection('client-avatar');
        }

        //dd($request->file('avatar'));
        //dd(pathinfo($request->file('avatar'), PATHINFO_EXTENSION));

       // if (isset($request->image)) {
         //   $client->addMedia($request->image)->toMediaCollection('client');
       // }

		if (isset($request->image)) {
            $ext = $request->file('image')->getClientOriginalExtension();
            $client
                ->addMedia($request->image)
                ->setFileName("client-".$client->id.'.'.$ext)
                ->toMediaCollection('client');
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

    public function export(Request $request)
    {
        $export = new ClientsExport($request->all());
        return Excel::download($export, 'clients.xlsx');
    }

	public function filter()
    {
        return view('clients.filter');
    }

	public function doFilter(Request $request)
    {
       /* $clientQuery = Client::query();

		if($request->fullname)
            $clientQuery->where('fullname', $request->fullname);

		if($request->gender)
            $clientQuery->where('gender', $request->gender);

		if($request->date_of_birth)
            $clientQuery->where('date_of_birth', $request->date_of_birth);

		if($request->email)
            $clientQuery->where('email', $request->email);

		if($request->mobile)
            $clientQuery->where('mobile', $request->mobile);

		if($request->company)
            $clientQuery->where('company', $request->company);

		if($request->type)
            $clientQuery->where('type', $request->type);

		if($request->country)
            $clientQuery->where('country', $request->country);

		$clients = $clientQuery->orderBy('id', 'ASC')->paginate(25);
		//dd($request->all());

        $filterQuery = http_build_query($request->except('_token'));
        //return view('clients.index', ['clients' => $clients, 'filterQuery' => $filterQuery]);*/

        return redirect()->route('clients.index', $request->except('_token'));
    }

    public function pdf(Client $client)
    {
        $pdf = PDF::loadView('pdf.client', ['client' => $client]);
        return $pdf->download('client_'.$client->fullname.'.pdf');
    }

    /**
     * Check clients birthdays and send greeting emails.
     * This method reads each client's `date_of_birth` column to
     * determine if today is their birthday. It is intended to run daily
     * via the scheduler.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function sendBirthdayEmails()
    {
        $today = Carbon::now()->format('m-d');

        $emailed = [];

        $clients = Client::whereNotNull('date_of_birth')->get();

        foreach ($clients as $client) {
            if (Carbon::parse($client->date_of_birth)->format('m-d') === $today) {
                $cacheKey = 'birthday_email_'.$client->id.'_'.Carbon::now()->toDateString();

                if (!Cache::has($cacheKey)) {
                    Mail::to($client->email)->send(new BirthdayWishMail($client));
                    Cache::put($cacheKey, true, now()->addDay());
                    $emailed[] = $client->email;
                }
            }
        }

        return response()->json(['emailed' => $emailed]);
    }

    /**
     * Notify clients when their passport is about to expire.
     * The number of days in advance is controlled by the
     * `PASSPORT_EXPIRY_DAYS` environment variable.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public static function sendPassportExpiryNotifications()
    {
        $days    = env('PASSPORT_EXPIRY_DAYS', 30);
        $target  = Carbon::now()->addDays($days)->toDateString();

        $emailed = [];

        $clients = Client::whereNotNull('expiry_date')->get();

        foreach ($clients as $client) {
            if (Carbon::parse($client->expiry_date)->toDateString() === $target) {
                $cacheKey = 'passport_expiry_' . $client->id . '_' . $target;

                if (!Cache::has($cacheKey)) {
                    $client->notify(new PassportExpiry($client->fullname));
                    Cache::put($cacheKey, true, now()->addDay());
                    $emailed[] = $client->email;
                }
            }
        }

        return response()->json(['emailed' => $emailed]);
    }
}
