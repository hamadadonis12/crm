<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Artisan;
use Carbon\Carbon;
use App\User;
use App\Client;
use App\Notifications\PassportExpiry;

class SendPassportExpiryNotificationsTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        config(['database.default' => 'sqlite']);
        config(['database.connections.sqlite.database' => ':memory:']);
    }

    public function test_command_dispatches_notifications()
    {
        $this->artisan('migrate');

        Notification::fake();

        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
            'is_superadmin' => 1,
            'is_active' => 1,
        ]);

        $client = Client::create([
            'fullname' => 'Test Client',
            'email' => 'client@example.com',
            'type' => 'Customer',
            'expiry_date' => Carbon::now()->addDays(env('PASSPORT_EXPIRY_DAYS', 30))->toDateString(),
        ]);

        Artisan::call('SendPassportExpiryNotifications');

        Notification::assertSentTo($client, PassportExpiry::class);
        Notification::assertSentTo($admin, PassportExpiry::class);
    }
}
