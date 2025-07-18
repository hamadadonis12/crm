<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Client;
use App\User;
use Carbon\Carbon;
use App\Notifications\PassportExpiry;

class SendPassportExpiryNotifications extends Command
{
    protected $signature = 'SendPassportExpiryNotifications';
    protected $description = 'Send passport expiry notifications to clients and admin';

    public function handle()
    {
        $expiryDate = Carbon::now()->addDays(env('PASSPORT_EXPIRY_DAYS', 30))->toDateString();

        $clients = Client::whereDate('expiry_date', $expiryDate)->get();
        $admin = User::where('is_superadmin', 1)->first();

        foreach ($clients as $client) {
            $client->notify(new PassportExpiry($client->fullname));

            if ($admin) {
                $admin->notify(new PassportExpiry($client->fullname));
            }
        }

        $this->info('Passport expiry notifications sent: ' . $clients->count());
    }
}
