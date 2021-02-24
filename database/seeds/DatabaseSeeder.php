<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $now = \Carbon\Carbon::now();
        DB::table('users')->insert([
            'name' => 'Master Admin',
            'email' => 'admin@tech.com',
            'email_verified_at'=>$now,
            'password' => Hash::make('12345678'),
            'created_at' => $now,
            'updated_at' => $now,
            'alamat'=>'Jl Jalan ',
            'telphone'=>'000000',
            'username'=>'admin',
            'role'=>'admin'
        ]);
    }
}
