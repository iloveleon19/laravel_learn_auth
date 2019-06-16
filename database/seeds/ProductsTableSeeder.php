<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->truncate();

        $now = date("Y-m-d H:i:s");

        DB::table('products')->insert([
            "created_id" => 1,
            "name" => "product_1",
            "active" => 1,
            "img_path" => '/home/vagrant/code/blog/public/assess/images/product_1.jpg',
            "fixed_price" => "100",
            "created_at" => $now,
            "updated_at" => $now,
        ]);

        DB::table('products')->insert([
            "created_id" => 1,
            "name" => "product_2",
            "active" => 1,
            "img_path" => '/home/vagrant/code/blog/public/assess/images/product_2.jpg',
            "fixed_price" => "200",
            "created_at" => $now,
            "updated_at" => $now,
        ]);

        DB::table('products')->insert([
            "created_id" => 1,
            "name" => "product_3",
            "active" => 1,
            "img_path" => '/home/vagrant/code/blog/public/assess/images/product_3.jpg',
            "fixed_price" => "300",
            "created_at" => $now,
            "updated_at" => $now,
        ]);
    }
}
