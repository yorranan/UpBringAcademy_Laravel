<?php

namespace Database\Seeders;



use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'age' => '1985-06-20',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password'),
            'admin' => true,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
