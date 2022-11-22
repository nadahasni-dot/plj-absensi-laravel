<?php

namespace Database\Seeders;

use App\Models\User;
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
        // User::create([
        //     'name' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'avatar' => null,
        //     'email_verified_at' => now(),
        //     'remember_token' => Str::random(10),
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'role' => 1,
        // ]);

        //generate 30 indonesians users
        $faker = Faker::create('id_ID');
        for($i = 1; $i <= 30; $i++){
            // insert data to users tables with Faker
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'nip' => random_int(100000000000000000, 999999999999999999),
                'email_verified_at' => $faker->dateTimeThisDecade('+2 years'),
                'remember_token' => Str::random(10),
                'password' => Hash::make(Str::random(6)),
            ]);
        }
    }
}
