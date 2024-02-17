<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WorkstationRepairsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('workstation_repairs')->delete();
        
        \DB::table('workstation_repairs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'manufacturing_id' => 2,
                'worker_id' => 3,
                'workstation_id' => 2,
                'note' => 'Chain jam',
                'created_at' => '2024-02-17 14:57:09',
                'updated_at' => '2024-02-17 14:57:09',
            ),
        ));
        
        
    }
}