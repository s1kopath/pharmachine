<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class VendorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('vendors')->delete();
        
        \DB::table('vendors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Warren Hamilton',
                'description' => 'Ginger Logan',
                'status' => 'Active',
                'email' => 'tisuqano@mailinator.com',
            'contact' => '+1 (812) 949-6313',
                'created_at' => '2024-02-17 05:00:36',
                'updated_at' => '2024-02-17 05:00:36',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Ingrid Moses',
                'description' => 'Wylie Mcknight',
                'status' => 'Active',
                'email' => 'bezaxihi@mailinator.com',
            'contact' => '+1 (615) 495-8759',
                'created_at' => '2024-02-17 05:00:40',
                'updated_at' => '2024-02-17 05:00:40',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Austin English',
                'description' => 'Hashim Raymond',
                'status' => 'Active',
                'email' => 'haho@mailinator.com',
            'contact' => '+1 (653) 126-9395',
                'created_at' => '2024-02-17 05:00:43',
                'updated_at' => '2024-02-17 05:00:43',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Jerome Johnson',
                'description' => 'Kenneth Hinton',
                'status' => 'Active',
                'email' => 'walyhywyq@mailinator.com',
            'contact' => '+1 (237) 825-9094',
                'created_at' => '2024-02-17 05:00:46',
                'updated_at' => '2024-02-17 05:00:46',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Donovan Bailey',
                'description' => 'Hilary Maynard',
                'status' => 'Active',
                'email' => 'vozafiw@mailinator.com',
            'contact' => '+1 (743) 473-8216',
                'created_at' => '2024-02-17 05:00:49',
                'updated_at' => '2024-02-17 05:00:49',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Zenaida Wilcox',
                'description' => 'Wing Hunter',
                'status' => 'Active',
                'email' => 'jecymali@mailinator.com',
            'contact' => '+1 (471) 521-5617',
                'created_at' => '2024-02-17 05:00:52',
                'updated_at' => '2024-02-17 05:00:52',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Hyacinth Terrell',
                'description' => 'Ria Santana',
                'status' => 'Active',
                'email' => 'tupeqy@mailinator.com',
            'contact' => '+1 (865) 675-4729',
                'created_at' => '2024-02-17 05:00:58',
                'updated_at' => '2024-02-17 05:00:58',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Orla Chase',
                'description' => 'Amaya Sexton',
                'status' => 'Active',
                'email' => 'tajybixo@mailinator.com',
            'contact' => '+1 (353) 833-9065',
                'created_at' => '2024-02-17 05:01:01',
                'updated_at' => '2024-02-17 05:01:01',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Lenore Santiago',
                'description' => 'Penelope Long',
                'status' => 'Active',
                'email' => 'bozykup@mailinator.com',
            'contact' => '+1 (907) 698-6083',
                'created_at' => '2024-02-17 05:01:04',
                'updated_at' => '2024-02-17 05:01:04',
            ),
        ));
        
        
    }
}