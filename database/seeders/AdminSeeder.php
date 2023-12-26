<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id'=>1,
                'role_id'=>1,
                'name'=>'Leen_Alashkar',
                'user_type'=>'Admin',
                'email'=>'leenalashkar@gmail.com',
                'password'=>'$2y$10$S5G5DsFonuC0ZMPUbcQU9uL/aI9mhrwkndu6BUL8hecy.B/NHQZJK',
                
            ],
        ]);
    }
}
