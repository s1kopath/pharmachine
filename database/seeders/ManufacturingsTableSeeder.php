<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ManufacturingsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('manufacturings')->delete();
        
        \DB::table('manufacturings')->insert(array (
            0 => 
            array (
                'id' => 1,
                'manufacturing_number' => 'MO 001',
                'warehouse_number' => 'WL 011',
                'demand_id' => 1,
                'product_id' => 1,
                'quantity' => 500,
                'material_id' => 1,
                'material_quantity' => 83.33,
                'worker_id' => 2,
                'workstation_id' => 1,
                'start_date' => '2024-02-17',
                'finishing_date' => '2024-02-20',
                'delivery_date' => '2024-03-30',
                'total_cost' => 97202.78,
                'status' => 'In Production',
                'created_at' => '2024-02-17 14:52:27',
                'updated_at' => '2024-02-17 14:53:37',
            ),
            1 => 
            array (
                'id' => 2,
                'manufacturing_number' => 'MO 004',
                'warehouse_number' => 'WL 014',
                'demand_id' => 4,
                'product_id' => 1,
                'quantity' => 960,
                'material_id' => 1,
                'material_quantity' => 160.0,
                'worker_id' => 3,
                'workstation_id' => 2,
                'start_date' => '2024-02-17',
                'finishing_date' => '2024-03-08',
                'delivery_date' => '2024-06-12',
                'total_cost' => 248908.8,
                'status' => 'Production paused',
                'created_at' => '2024-02-17 14:56:13',
                'updated_at' => '2024-02-17 14:57:09',
            ),
        ));
        
        
    }
}