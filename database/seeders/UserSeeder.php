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
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'admin',
            'age' => '1985-06-20',
            'email' => 'admin@softui.com',
            'password' => Hash::make('secret'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Maria',
            'age' => '1995-05-15',
            'email' => 'maria@example.com',
            'password' => Hash::make('abcdef'),
            'admin' => false,
        ]);
        DB::table('children')->insert([
            'points' => 0,
            'user_children_id' => 2,
            'parent_id' => 1,
        ]);
    }
}
