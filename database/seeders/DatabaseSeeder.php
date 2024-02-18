<?php

namespace Database\Seeders;

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
        // $this->call(UserTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VendorsTableSeeder::class);
        $this->call(MaterialsTableSeeder::class);
        $this->call(WorkersTableSeeder::class);
        $this->call(WorkstationsTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(DemandsTableSeeder::class);
        $this->call(ManufacturingsTableSeeder::class);
        $this->call(WarehousesTableSeeder::class);
        $this->call(WorkstationRepairsTableSeeder::class);
    }
}
