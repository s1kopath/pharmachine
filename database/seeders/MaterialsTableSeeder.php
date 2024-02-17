<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MaterialsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('materials')->delete();
        
        \DB::table('materials')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Centella Asiatica',
                'description' => 'Centella asiatica, commonly known as Indian pennywort, Asiatic pennywort, spadeleaf, coinwort or gotu kola, is a herbaceous, perennial plant in the flowering plant family Apiaceae',
                'vendor_id' => 4,
                'product_per_kg' => 6,
                'product_price_per_kg' => 56.0,
                'available_quantity' => 11489.67,
                'status' => 'Available',
                'order_quantity' => 0.0,
                'order_date' => '2024-02-17',
                'created_at' => '2024-02-17 05:03:07',
                'updated_at' => '2024-02-17 14:56:13',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Rehmannia glutinosa',
                'description' => 'Di-huang, or "Yellow Earth." Rehmania is available in China, Japan, Europe and America',
                'vendor_id' => 5,
                'product_per_kg' => 15,
                'product_price_per_kg' => 32.0,
                'available_quantity' => 5960.0,
                'status' => 'Available',
                'order_quantity' => 0.0,
                'order_date' => '2024-02-17',
                'created_at' => '2024-02-17 05:15:23',
                'updated_at' => '2024-02-17 14:22:59',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Asian Ginseng',
            'description' => 'Asian Ginseng (Panax ginseng) has become one of the most popular Ayurvedic herbs in the Western world',
                'vendor_id' => 3,
                'product_per_kg' => 2,
                'product_price_per_kg' => 40.0,
                'available_quantity' => 1485.0,
                'status' => 'Available',
                'order_quantity' => 0.0,
                'order_date' => '2024-02-17',
                'created_at' => '2024-02-17 05:19:53',
                'updated_at' => '2024-02-17 14:23:04',
            ),
        ));
        
        
    }
}