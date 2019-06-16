<?php

use Illuminate\Database\Seeder;

class ManagerLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manager_levels')->truncate();

        $now = date('Y-m-d H-i-s');

        DB::table('manager_levels')->insert([
            'level' => 0,
            'title' => 'boss',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('manager_levels')->insert([
            'level' => 1,
            'title' => 'manager',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('manager_levels')->insert([
            'level' => 2,
            'title' => 'seller',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
