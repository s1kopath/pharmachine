<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 3,
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'email_verified_at' => NULL,
                'password' => '$2y$10$U3ZV6Of16USuBD84aoGdvu4tKjOEIf8/dZig5Xg5l4op/ewl9caE2',
                'remember_token' => NULL,
                'created_at' => '2024-01-27 06:14:29',
                'updated_at' => '2024-01-27 06:14:29',
            ),
            1 => 
            array (
                'id' => 5,
                'name' => 'Jeremy Ayala',
                'email' => 'employee@gmail.com',
                'role' => 'worker',
                'email_verified_at' => NULL,
                'password' => '$2y$10$zhstzgr5X3Plgb5RRpr0IO88RIp3g0ldWsnIEcuESPhdhA32F1SbK',
                'remember_token' => NULL,
                'created_at' => '2024-02-04 18:07:07',
                'updated_at' => '2024-02-17 15:29:51',
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'Ocean English',
                'email' => 'kego@mailinator.com',
                'role' => 'worker',
                'email_verified_at' => NULL,
                'password' => '$2y$10$AH0jxTJcMtvSb//pu4jBh.u3xT/13rP/kuXRlR4YFPPA//ekCeU1.',
                'remember_token' => NULL,
                'created_at' => '2024-02-17 04:39:50',
                'updated_at' => '2024-02-17 04:39:50',
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'Scott Gilbert',
                'email' => 'cywogyje@mailinator.com',
                'role' => 'worker',
                'email_verified_at' => NULL,
                'password' => '$2y$10$wPKL/Op.11a10V2C8FXKgeuN9vCNjua0ciQsILUsGWs3CWdfy2/Wa',
                'remember_token' => NULL,
                'created_at' => '2024-02-17 04:40:11',
                'updated_at' => '2024-02-17 04:40:11',
            ),
            4 => 
            array (
                'id' => 8,
                'name' => 'Clarke Hewitt',
                'email' => 'gisoq@mailinator.com',
                'role' => 'worker',
                'email_verified_at' => NULL,
                'password' => '$2y$10$qDQLYQE1pzVD52AFK3Wwuumb9V/RQFNGST6NQvrN0sidS6Nqf7Uxm',
                'remember_token' => NULL,
                'created_at' => '2024-02-17 04:40:31',
                'updated_at' => '2024-02-17 04:40:31',
            ),
            5 => 
            array (
                'id' => 9,
                'name' => 'Timothy Lester',
                'email' => 'qaze@mailinator.com',
                'role' => 'worker',
                'email_verified_at' => NULL,
                'password' => '$2y$10$ouY4i5MlaHlZjiZP9mp6Yu52nDUAAHF24sMbVU8iM7SiUEwC73lpS',
                'remember_token' => NULL,
                'created_at' => '2024-02-17 04:40:51',
                'updated_at' => '2024-02-17 04:40:51',
            ),
        ));
        
        
    }
}