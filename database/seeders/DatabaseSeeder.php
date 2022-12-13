<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use App\Models\Schedule;
use App\Models\Attendance;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // generate 10 users
        // User::factory(10)->create();

        // generate 1 admin
        Admin::create([
            'nip' => '20221201',
            'name' => 'Admin',
            'username' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password            
        ]);

        //generate 30 indonesians users
        $faker = Faker::create('id_ID');
        for ($i = 1; $i <= 30; $i++) {
            // insert data to users tables with Faker
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'nip' => random_int(100000000000000000, 999999999999999999),
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            ]);
        }

        // generate 1 schedule
        Schedule::create([
            'lat' => '-8.157552',
            'lng' => '113.722978',
            'radius' => '20',
            'office' => 'Jurusan Teknologi Informasi',
            'clock_in' => '07:00:00',
            'clock_out' => '15:00:00'
        ]);

        //generate 1 day attendance of 30 users
        for ($j = 1; $j <= 30; $j++) {
            $date_in_min = '2022-11-25 06:45:00';
            $date_in_max = '2022-11-25 07:15:00';
            $date_out_min = '2022-11-25 14:45:00';
            $date_out_max = '2022-11-25 15:15:00';
            $min_in = strtotime($date_in_min);
            $max_in = strtotime($date_in_max);
            $rand_in = rand($min_in, $max_in);
            $min_out = strtotime($date_out_min);
            $max_out = strtotime($date_out_max);
            $rand_out = rand($min_out, $max_out);
            $clock_in = date('Y-m-d H:i:s', $rand_in);
            $clock_out = date('Y-m-d H:i:s', $rand_out);
            Attendance::create([
                'id_user' => $j,
                'clock_in' => $clock_in,
                'clock_out' => $clock_out
            ]);
        }
    }
}
