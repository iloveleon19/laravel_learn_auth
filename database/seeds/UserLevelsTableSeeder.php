<?php

use Illuminate\Database\Seeder;

class UserLevelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user_levels')->truncate();

        $now = date('Y-m-d H:i:s');

        DB::table('user_levels')->insert([
            'level' => '1',
            'title' => 'diamond member',
            'discount' => '{"ids":[1]}',
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('user_levels')->insert([
            'level' => '2',
            'title' => 'gold member',
            'discount' => '{"ids":[2]}',
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
