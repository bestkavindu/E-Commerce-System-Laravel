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
                'id' => 1,
                'name' => 'Test User',
                'email' => 'test@example.com',
                'email_verified_at' => '2025-09-03 14:00:05',
                'password' => '$2y$12$FkTvSFbnXyqwuG5vP5SDT.nR3Fon3/UFGrQowjgeFKuA7.Q2rcvMm',
                'remember_token' => '65XpohEcim',
                'created_at' => '2025-09-03 14:00:05',
                'updated_at' => '2025-09-03 14:00:05',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'admin',
                'email' => 'bestkavindu@gmail.com',
                'email_verified_at' => NULL,
                'password' => '$2y$12$qY.e7ZdJoMle/Cd7Rf7te.FUhrdhC8EqyPgU7nfgQAEnQlbHtqLAe',
                'remember_token' => NULL,
                'created_at' => '2025-09-03 14:02:28',
                'updated_at' => '2025-09-03 14:02:28',
            ),
        ));
        
        
    }
}