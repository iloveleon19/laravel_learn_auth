<?php

use Illuminate\Database\Seeder;

class ActionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('actions')->truncate();

        $now = date("Y-m-d H:i:s");

        DB::table('actions')->insert([
            'action' => 'minus',
            'active' => 1,
            'type' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('actions')->insert([
            'action' => 'multiplication',
            'active' => 1,
            'type' => 2,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
