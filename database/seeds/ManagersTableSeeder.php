<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class ManagersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('managers')->truncate();
        
        $now = date('y-m-d H:i:s');

        DB::table('managers')->insert([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin'),
            'active' => 1,
            'level' => 0,
            'upper_id' => '{"level_0":1}',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('managers')->insert([
            'name' => 'admin_1',
            'email' => 'admin_1@admin.com',
            'password' => Hash::make('admin'),
            'active' => 1,
            'level' => 1,
            'upper_id' => '{"level_0":1,"level_1":2}',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('managers')->insert([
            'name' => 'admin_2',
            'email' => 'admin_2@admin.com',
            'password' => Hash::make('admin'),
            'active' => 1,
            'level' => 1,
            'upper_id' => '{"level_0":1,"level_1":3}',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('managers')->insert([
            'name' => 'admin_3',
            'email' => 'admin_3@admin.com',
            'password' => Hash::make('admin'),
            'active' => 1,
            'level' => 1,
            'upper_id' => '{"level_0":1,"level_1":4}',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('managers')->insert([
            'name' => 'admin_4',
            'email' => 'admin_4@admin.com',
            'password' => Hash::make('admin'),
            'active' => 1,
            'level' => 1,
            'upper_id' => '{"level_0":1,"level_1":5}',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('managers')->insert([
            'name' => 'admin_5',
            'email' => 'admin_5@admin.com',
            'password' => Hash::make('admin'),
            'active' => 1,
            'level' => 1,
            'upper_id' => '{"level_0":1,"level_1":6}',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
