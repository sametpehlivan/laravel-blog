<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name'=>'Admin',
            'user_name'=>'admin',
            'password'=>bcrypt('123456'),
            'email'=>'admin@blabla.com',
            'created_at'=>now()
        ]);

    }
}
