<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WorkersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('workers')->delete();
        
        \DB::table('workers')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 5,
                'address' => 'Adipisci eos sint oc',
            'contact' => '+1 (601) 273-4007',
                'gender' => 'Male',
                'date_of_birth' => '1999-03-22',
                'age' => 24,
                'joining_date' => '2024-02-04',
                'salary' => 5000.0,
                'labour_per_hour' => 6.9399999999999995,
                'image' => '',
                'status' => 'Available',
                'created_at' => '2024-02-04 18:07:07',
                'updated_at' => '2024-02-04 18:07:07',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 6,
                'address' => 'Velit dolor quia asp',
            'contact' => '+1 (304) 864-5169',
                'gender' => 'Male',
                'date_of_birth' => '1987-03-09',
                'age' => 36,
                'joining_date' => '2024-02-17',
                'salary' => 15000.0,
                'labour_per_hour' => 20.83,
                'image' => '20240217040250.jpg',
                'status' => 'Unavailable',
                'created_at' => '2024-02-17 04:39:50',
                'updated_at' => '2024-02-17 14:52:27',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 7,
                'address' => 'Vel ipsa pariatur',
            'contact' => '+1 (742) 511-8833',
                'gender' => 'Male',
                'date_of_birth' => '1993-10-01',
                'age' => 30,
                'joining_date' => '2024-02-17',
                'salary' => 20000.0,
                'labour_per_hour' => 27.78,
                'image' => '20240217040211.jpg',
                'status' => 'Unavailable',
                'created_at' => '2024-02-17 04:40:11',
                'updated_at' => '2024-02-17 14:56:13',
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 8,
                'address' => 'Unde officiis est vo',
            'contact' => '+1 (388) 834-9269',
                'gender' => 'Male',
                'date_of_birth' => '1997-02-05',
                'age' => 27,
                'joining_date' => '2024-02-17',
                'salary' => 18000.0,
                'labour_per_hour' => 25.0,
                'image' => '20240217040231.jpg',
                'status' => 'Available',
                'created_at' => '2024-02-17 04:40:31',
                'updated_at' => '2024-02-17 04:40:31',
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 9,
                'address' => 'Id rerum dolore nece',
            'contact' => '+1 (726) 935-8475',
                'gender' => 'Male',
                'date_of_birth' => '2004-06-18',
                'age' => 19,
                'joining_date' => '2024-02-17',
                'salary' => 17500.0,
                'labour_per_hour' => 24.31,
                'image' => '20240217040251.jpg',
                'status' => 'Available',
                'created_at' => '2024-02-17 04:40:51',
                'updated_at' => '2024-02-17 04:40:51',
            ),
        ));
        
        
    }
}