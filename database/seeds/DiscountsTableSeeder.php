<?php

use Illuminate\Database\Seeder;

class DiscountsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('discounts')->truncate();

        $now = date("Y-m-d H-i-s");

        DB::table('discounts')->insert([
            'title' => 'diamond member',
            'discount' => 0.85,
            'action_type' => 2,
            'created_id' => 1,
            'active' => 1,
            'is_indefinitely' => true,
            'is_auto_apply_checkout' => false,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('discounts')->insert([
            'title' => 'gold member',
            'discount' => 0.9,
            'action_type' => 2,
            'created_id' => 1,
            'active' => 1,
            'is_indefinitely' => true,
            'is_auto_apply_checkout' => false,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
