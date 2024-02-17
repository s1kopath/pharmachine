<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WarehousesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('warehouses')->delete();
        
        \DB::table('warehouses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'manufacturing_id' => 1,
                'user_name' => NULL,
                'status' => 'Waiting for production',
                'delivered_on' => NULL,
                'created_at' => '2024-02-17 14:52:27',
                'updated_at' => '2024-02-17 14:52:27',
            ),
            1 => 
            array (
                'id' => 2,
                'manufacturing_id' => 2,
                'user_name' => NULL,
                'status' => 'Waiting for production',
                'delivered_on' => NULL,
                'created_at' => '2024-02-17 14:56:13',
                'updated_at' => '2024-02-17 14:56:13',
            ),
        ));
        
        
    }
}