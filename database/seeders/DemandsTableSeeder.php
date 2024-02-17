<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DemandsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('demands')->delete();
        
        \DB::table('demands')->insert(array (
            0 => 
            array (
                'id' => 1,
                'product_id' => 1,
                'product_quantity' => 500,
                'delivery_date' => '2024-03-30',
                'status' => 'produced',
                'created_at' => '2024-02-17 14:23:36',
                'updated_at' => '2024-02-17 14:53:37',
            ),
            1 => 
            array (
                'id' => 2,
                'product_id' => 2,
                'product_quantity' => 600,
                'delivery_date' => '2024-04-25',
                'status' => 'processing',
                'created_at' => '2024-02-17 14:23:47',
                'updated_at' => '2024-02-17 14:54:29',
            ),
            2 => 
            array (
                'id' => 3,
                'product_id' => 3,
                'product_quantity' => 960,
                'delivery_date' => '2024-05-01',
                'status' => 'confirm',
                'created_at' => '2024-02-17 14:23:56',
                'updated_at' => '2024-02-17 14:54:50',
            ),
            3 => 
            array (
                'id' => 4,
                'product_id' => 1,
                'product_quantity' => 960,
                'delivery_date' => '2024-06-12',
                'status' => 'produced',
                'created_at' => '2024-02-17 14:24:05',
                'updated_at' => '2024-02-17 14:56:58',
            ),
        ));
        
        
    }
}