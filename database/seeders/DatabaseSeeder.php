<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use App\Models\Pelayanan;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(1)->create();



        User::create([
            'name' => 'januar',
            'email' => 'januar@gmail.com',
            'phone' => '082116162688',
            'role' => '1',
            'email_verified_at' => now(),
            'password' => bcrypt('123456'), // password
            'remember_token' => Str::random(10),
            'reff' => 'ADM000'
        ]);

        Admin::create([
            'user_id'=>1,
            'provinsi'=>35,
            'kota'=>3551,
            'kecamatan'=>3551,
            'desa'=>3551,
            'code'=>'ADM001'

        ]);
    }
}
