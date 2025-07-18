<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ClientController;

class SendPassportExpiryNotifications extends Command
{
    protected $signature = 'SendPassportExpiryNotifications';
    protected $description = 'Send passport expiry reminder emails to clients';

    public function handle()
    {
        $response = ClientController::sendPassportExpiryNotifications();
        $data = $response->getData(true);
        $emails = $data['emailed'] ?? [];

        if (empty($emails)) {
            $this->info('No passport expiry emails sent.');
        } else {
            $this->info('Passport expiry emails sent to: ' . implode(', ', $emails));
        }
    }
}
