<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'number_phone' => '082272958135',
            'street' => 'tangerang',
            'access' => 0,
            'password' => Hash::make('password'),
        ]);

        User::create([
            'name' => 'Fadhil Purnahar',
            'email' => 'fadhil.purnahar@gmail.com',
            'number_phone' => '082272958135',
            'street' => 'tangerang',
            'access' => 1,
            'password' => Hash::make('password'),
        ]);
    }
}
