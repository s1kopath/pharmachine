<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Gotu Kola',
                'product_type' => 'Capsule',
                'description' => 'Centella asiaticaVegetable cellulose [1]Magnesium stearate [2] capsule shell release agent',
                'material_id' => 1,
                'image' => '20240217050210.jpg',
                'created_at' => '2024-02-17 05:05:10',
                'updated_at' => '2024-02-17 05:05:10',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'DICARE',
                'product_type' => 'Capsule',
            'description' => 'PACK SIZE Capsule DICARE is a research product of Ergon Pharmaceuticals (Ayu). It is a proven medicine for all types of Diabetes by Ayurbvedic formulation.',
                'material_id' => 2,
                'image' => '20240217050227.jpg',
                'created_at' => '2024-02-17 05:16:27',
                'updated_at' => '2024-02-17 05:16:27',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Cap ERGO GING',
                'product_type' => 'Tablet',
            'description' => 'The main ingredient of Capsule ERGO GING is Asian Ginseng (Panax ginseng).',
                'material_id' => 3,
                'image' => '20240217050211.jpg',
                'created_at' => '2024-02-17 05:21:11',
                'updated_at' => '2024-02-17 05:21:11',
            ),
        ));
        
        
    }
}