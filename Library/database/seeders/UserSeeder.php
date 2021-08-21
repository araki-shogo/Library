<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        // for ($i = 1; $i <= 10; $i++) {
        //     DB::table('users')->insert([
        //         'id' => $i,
        //         'name' => 'user' . $i,
        //         'email' => 'email' . $i . '@gmail.com',
        //         'password' => Hash::make('password'),
        //         'permission' => '0'
        //     ]);
        // }
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'master',
            'email' => 'master@master.master',
            'password' => Hash::make('master'),
            'permission' => '1'
        ]);
    }
}
