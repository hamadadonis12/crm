<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ClientController;

class SendPassportExpiryNotifications extends Command
{
    protected $signature = 'SendPassportExpiryNotifications';
    protected $description = 'Notify clients about upcoming passport expirations';

    public function handle()
    {
        $response = ClientController::sendPassportExpiryNotifications();
        $data = $response->getData(true);
        $emails = $data['emailed'] ?? [];

        if (empty($emails)) {
            $this->info('No passport expiry notifications sent.');
        } else {
            $this->info('Passport expiry notifications sent to: ' . implode(', ', $emails));
        }
    }
}
