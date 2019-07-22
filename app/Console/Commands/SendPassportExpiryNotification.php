<?php

namespace App\Console\Commands;

use App\Client;
use Notification;
use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Notifications\PassportExpiry;

class SendPassportExpiryNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'worldtravel:send-passport-expiry-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will send expiry passport notification for clients.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $dateFormat = Carbon::now()->addDays(30)->format('Y-m-d');
	
        $clients = Client::all();
        foreach($clients as $client) 
        {
            if($client->expiry_date === $dateFormat){
                Notification::send($client, new PassportExpiry);
                $this->line('email sent to '.$client->email);
                
                // this is only for mailtrap dev account. it does not allow multiple emails per second.
                if(env('MAIL_HOST', false) == 'smtp.mailtrap.io'){
                    sleep(1);
                }
            }
        }
    }
}
