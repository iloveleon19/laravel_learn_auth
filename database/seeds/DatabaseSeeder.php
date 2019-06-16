<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //disable foreign key check for this connection before running seeders
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        $this->call(UsersTableSeeder::class);
        $this->call(ManagersTableSeeder::class);
        $this->call(ManagerLevelsTableSeeder::class);
        $this->call(ActionsTableSeeder::class);

        $this->call(DiscountsTableSeeder::class);
        $this->call(UserLevelsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(OrdersTableSeeder::class);

        // supposed to only apply to a single connection and reset it's self
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
