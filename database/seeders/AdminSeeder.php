<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password123'),
            'role' => 'admin',
            'given_name' => 'Admin',
            'gender' => 'other',
            'cpr' => 'CPR-ADMIN001',
            'phone_number' => '+1234567890',
            'org_name' => 'Admin Organization',
            'is_representative' => false,
            'citizen' => true,
            'how_did_you_hear' => 'System Default',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
