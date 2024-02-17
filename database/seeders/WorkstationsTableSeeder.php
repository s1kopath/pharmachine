<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WorkstationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('workstations')->delete();
        
        \DB::table('workstations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Proton Rotary Tableting Machine, 8 stn mini press',
            'description' => 'Totally enclosed, i.e. top half of the machine (compression zone)',
                'manufacturer' => 'Proton Engineers',
                'output' => 10,
                'status' => 'occupied',
                'created_at' => '2024-02-17 04:51:49',
                'updated_at' => '2024-02-17 14:52:27',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Associated Packtech Semi-Automatic Bottle Rinser Filler Capper, pack tech, 1-2 HP',
                'description' => 'We are manufacturer of bottle rinser filler capper machine. bottle rinser filler capper machine is use for water bottle industries',
                'manufacturer' => 'Associated Packtech',
                'output' => 2,
                'status' => 'Workstation damaged',
                'created_at' => '2024-02-17 04:53:46',
                'updated_at' => '2024-02-17 14:57:09',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'SS Hand Operated Automatic Tablet Coating System, For Industrial, Capacity: 3 Ton',
                'description' => 'Exporter and Supplier of a wide range of Tablet Section R And D Machine, Tablet Section Production Scale Machine, Syrup Liquid Section Machine, Ointment Cream Lotion Manufacturing Plant, Capsule Section Machinery, etc.',
                'manufacturer' => 'Chitra Machineries Pvt. Ltd',
                'output' => 12,
                'status' => 'available',
                'created_at' => '2024-02-17 04:55:36',
                'updated_at' => '2024-02-17 04:55:36',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Vbtech Instrumented R&D Tablet Press Machine',
                'description' => 'Capacity: 14,400 Tablets Max., Model Number/Name: Eka Presss',
                'manufacturer' => 'Vbtech',
                'output' => 20,
                'status' => 'available',
                'created_at' => '2024-02-17 04:56:53',
                'updated_at' => '2024-02-17 04:56:53',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'SS Three Phase PET Bottle Rinser Filler Capper Machine',
                'description' => 'We offer PET Bottle 12 head Rinser 12 head Filler and 6 head Capper Machine',
                'manufacturer' => 'Maruti Machines',
                'output' => 8,
                'status' => 'available',
                'created_at' => '2024-02-17 04:58:28',
                'updated_at' => '2024-02-17 04:58:28',
            ),
        ));
        
        
    }
}