<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use App\Client;
use App\User;
use App\Notifications\PassportExpiry;

class PassportExpiryCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_passport_expiry_notifications_sent()
    {
        Notification::fake();
        Carbon::setTestNow('2025-07-18');

        $admin = User::create([
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('secret'),
            'is_superadmin' => 1,
            'is_active' => 1,
        ]);

        $client = Client::create([
            'fullname' => 'Expiring Soon',
            'email' => 'soon@example.com',
            'expiry_date' => Carbon::now()->addDays(30)->toDateString(),
            'type' => 'Customer',
        ]);

        $other = Client::create([
            'fullname' => 'Far Away',
            'email' => 'far@example.com',
            'expiry_date' => Carbon::now()->addDays(10)->toDateString(),
            'type' => 'Customer',
        ]);

        Artisan::call('passport-expiry');

        Notification::assertSentTo($client, PassportExpiry::class);
        Notification::assertSentTo($admin, PassportExpiry::class);
        Notification::assertNotSentTo($other, PassportExpiry::class);
    }
}
