<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddressesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('addresses')->delete();
        
        \DB::table('addresses')->insert(array (
            0 => 
            array (
                'id' => 1,
                'order_id' => 5,
                'first_name' => 'Sachin',
                'last_name' => 'Kavindu',
                'phone' => '0775835974',
                'street_address' => '241
Udumulla',
                'city' => 'Balangoda',
                'state' => 'Sabaragamuwa',
                'postal_code' => '70100',
                'created_at' => '2025-09-15 18:58:03',
                'updated_at' => '2025-09-15 18:58:03',
            ),
        ));
        
        
    }
}