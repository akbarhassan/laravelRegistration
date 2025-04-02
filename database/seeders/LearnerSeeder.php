<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class LearnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Insert 50 learners
        foreach (range(1, 50) as $index) {
            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'password' => Hash::make('password'),
                'role' => 'learner',
                'given_name' => $faker->firstName, // First name
                'gender' => $faker->randomElement(['male', 'female', 'other']),
                'cpr' => 'CPR-' . $faker->unique()->numerify('########'), 
                'phone_number' => '+1' . $faker->unique()->numerify('##########'), 
                'org_name' => $faker->company, 
                'is_representative' => $faker->boolean, 
                'citizen' => $faker->boolean, 
                'how_did_you_hear' => $faker->sentence, 
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
