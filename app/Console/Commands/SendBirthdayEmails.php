<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\ClientController;

class SendBirthdayEmails extends Command
{
    protected $signature = 'SendBirthdayEmails';
    protected $description = 'Send birthday emails to clients';

    public function handle()
    {
        $response = ClientController::sendBirthdayEmails();
        $data = $response->getData(true);
        $emails = $data['emailed'] ?? [];

        if (empty($emails)) {
            $this->info('No birthday emails sent.');
        } else {
            $this->info('Birthday emails sent to: ' . implode(', ', $emails));
        }
    }
}
