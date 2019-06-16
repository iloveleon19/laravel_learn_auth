<?php

use Illuminate\Database\Seeder;
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
        DB::table('users')->truncate();
        
        $now = date('y-m-d H:i:s');

        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => Hash::make('user'),
            'active' => 1,
            'level' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('users')->insert([
            'name' => 'user_1',
            'email' => 'user_1@user.com',
            'password' => Hash::make('user'),
            'active' => 1,
            'level' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('users')->insert([
            'name' => 'user_2',
            'email' => 'user_2@user.com',
            'password' => Hash::make('user'),
            'active' => 1,
            'level' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('users')->insert([
            'name' => 'user_3',
            'email' => 'user_3@user.com',
            'password' => Hash::make('user'),
            'active' => 1,
            'level' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('users')->insert([
            'name' => 'user_4',
            'email' => 'user_4@user.com',
            'password' => Hash::make('user'),
            'active' => 1,
            'level' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('users')->insert([
            'name' => 'user_5',
            'email' => 'user_5@user.com',
            'password' => Hash::make('user'),
            'active' => 1,
            'level' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
