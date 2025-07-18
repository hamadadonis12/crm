<?php

namespace App\Console\Commands;

use App\Client;
use App\User;
use App\Notifications\PassportExpiry;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;

class NotifyPassportExpiry extends Command
{
    protected $signature = 'passport-expiry';

    protected $description = 'Notify clients and admin of upcoming passport expiry';

    public function handle()
    {
        $date = Carbon::now()->addDays(env('PASSPORT_EXPIRY_DAYS', 30))->format('Y-m-d');

        $admin = User::where('is_superadmin', 1)->first();

        $notified = [];

        foreach (Client::whereNotNull('expiry_date')->get() as $client) {
            if (Carbon::parse($client->expiry_date)->format('Y-m-d') === $date) {
                Notification::send($client, new PassportExpiry);
                if ($admin) {
                    Notification::send($admin, new PassportExpiry($client->fullname));
                }
                $notified[] = $client->email;
            }
        }

        if (empty($notified)) {
            $this->info('No passport expiry notifications sent.');
        } else {
            $this->info('Passport expiry notifications sent to: ' . implode(', ', $notified));
        }
    }
}
