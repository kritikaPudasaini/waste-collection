<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Area;
use App\Models\Role;
use App\Models\Schedule;
use App\Models\User;
use App\Models\Feedback;
use App\Models\Payment;

class DatabaseTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_creates_areas_table()
    {
        $area = Area::create([
            'local_unit' => 'Kathmandu',
            'address' => 'Chapabot',
            'ward_no' => 1,
        ]);

        $this->assertDatabaseHas('areas', [
            'local_unit' => 'Kathmandu',
            'address' => 'Chapabot',
            'ward_no' => 1,
        ]);
    }

    /** @test */
    public function it_creates_roles_table()
    {
        $role = Role::create([
            'name' => 'admin',
        ]);

        $this->assertDatabaseHas('roles', [
            'name' => 'admin',
        ]);
    }

    /** @test */
    public function it_creates_schedules_table()
    {
        $area = Area::create([
            'local_unit' => 'Kathmandu',
            'address' => 'Chapabot',
            'ward_no' => 1,
        ]);

        $schedule = Schedule::create([
            'collection_day' => 'Monday',
            'collection_time' => '08:00:00',
            'area_id' => $area->id,
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('schedules', [
            'collection_day' => 'Monday',
            'collection_time' => '08:00:00',
            'area_id' => $area->id,
            'status' => 'pending',
        ]);
    }

    /** @test */
    public function it_creates_users_table()
    {
        $area = Area::create([
            'local_unit' => 'Kathmandu',
            'address' => 'Chapabot',
            'ward_no' => 1,
        ]);

        $role = Role::create([
            'name' => 'User',
        ]);

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,
            'area_id' => $area->id,
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'role_id' => $role->id,
            'area_id' => $area->id,
        ]);
    }

    /** @test */
    public function it_creates_feedback_table()
    {
        $feedback = Feedback::create([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'phone' => '1234567890',
            'message' => 'This is a test message.',
        ]);

        $this->assertDatabaseHas('feedback', [
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'phone' => '1234567890',
            'message' => 'This is a test message.',
        ]);
    }

    /** @test */
    public function it_creates_payments_table()
    {
        $area = Area::create([
            'local_unit' => 'Kathmandu',
            'address' => 'Chapabot',
            'ward_no' => 1,
        ]);

        $role = Role::create([
            'name' => 'User',
        ]);

        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => bcrypt('password'),
            'role_id' => $role->id,
            'area_id' => $area->id,
        ]);

        $payment = Payment::create([
            'transaction_id' => 'TX123456789',
            'user_id' => $user->id,
            'payment_method' => 'esewa',
            'payment_date' => now(),
            'payment_amount' => 100.00,
            'payment_period' => 'Monthly',
            'status' => 'pending',
        ]);

        $this->assertDatabaseHas('payments', [
            'transaction_id' => 'TX123456789',
            'user_id' => $user->id,
            'payment_method' => 'esewa',
            'payment_amount' => 100.00,
            'status' => 'pending',
        ]);
    }
}
