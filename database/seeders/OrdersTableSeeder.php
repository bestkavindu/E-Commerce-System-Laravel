<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('orders')->delete();
        
        \DB::table('orders')->insert(array (
            0 => 
            array (
                'id' => 5,
                'user_id' => 2,
                'grand_total' => '100000.00',
                'payment_method' => 'strip',
                'payment_status' => 'pending',
                'status' => 'processing',
                'currency' => 'lkr',
                'shipment_amount' => NULL,
                'shipment_method' => 'fedex',
                'notes' => 'f',
                'created_at' => '2025-09-15 17:07:30',
                'updated_at' => '2025-09-15 17:08:41',
            ),
        ));
        
        
    }
}