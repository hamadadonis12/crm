<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Mail;
use App\Client;
use Carbon\Carbon;
use App\Mail\BirthdayWishMail;

class SendBirthdayEmailsTest extends TestCase
{
    use RefreshDatabase;

    public function test_birthday_emails_sent_to_today_clients()
    {
        Mail::fake();

        Carbon::setTestNow('2025-07-18');

        $client = Client::create([
            'fullname' => 'John Doe',
            'email' => 'john@example.com',
            'date_of_birth' => Carbon::now()->toDateString(),
            'type' => 'Customer',
        ]);

        $other = Client::create([
            'fullname' => 'Jane Doe',
            'email' => 'jane@example.com',
            'date_of_birth' => Carbon::now()->subDay()->toDateString(),
            'type' => 'Customer',
        ]);

        Artisan::call('SendBirthdayEmails');

        Mail::assertSent(BirthdayWishMail::class, function ($mail) use ($client) {
            return $mail->hasTo('john@example.com');
        });

        Mail::assertNotSent(BirthdayWishMail::class, function ($mail) use ($other) {
            return $mail->hasTo('jane@example.com');
        });
    }
}
