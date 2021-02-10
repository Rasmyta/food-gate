<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        DB::table('users')->insert([
            'dni' => $faker->randomNumber($nbDigits = 8) . Str::random(1),
            'name' => 'Rasma',
            'surname' => $faker->lastName,
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'address' => $faker->streetAddress,
            'city' => $faker->city,
            'phone' => $faker->phoneNumber,
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'role_id' => 1
        ]);
    }
}
