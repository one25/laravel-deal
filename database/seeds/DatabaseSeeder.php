<?php

use Illuminate\Database\Seeder;
use App\Models\Seller;
use App\Models\Buyer;
use App\Models\Good;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        // Sellers
        Seller::create(
            [
                'name' => 'seller1',
            ]
        ); 
        Seller::create(
            [
                'name' => 'seller2',
            ]
        ); 
        Seller::create(
            [
                'name' => 'seller3',
            ]
        );         
        Seller::create(
            [
                'name' => 'seller4',
            ]
        ); 
        Seller::create(
            [
                'name' => 'seller5',
            ]
        ); 
        Seller::create(
            [
                'name' => 'seller6',
            ]
        );         

        // Buyers
        Buyer::create(
            [
                'name' => 'buyer1',
            ]
        ); 
        Buyer::create(
            [
                'name' => 'buyer2',
            ]
        ); 
        Buyer::create(
            [
                'name' => 'buyer3',
            ]
        );         
        Buyer::create(
            [
                'name' => 'buyer4',
            ]
        ); 
        Buyer::create(
            [
                'name' => 'buyer5',
            ]
        ); 
        Buyer::create(
            [
                'name' => 'buyer6',
            ]
        );         

        // Goods
        Good::create(
            [
                'seller_id' => 1,
                'buyer_id' => 3,
                'name' => 'good1',
                'price' => 50.5,
                'date' => '2019-08-01',
            ]
        ); 
        Good::create(
            [
                'seller_id' => 3,
                'buyer_id' => 1,
                'name' => 'good2',
                'price' => 77.77,
                'date' => '2019-08-08',
            ]
        );  
        Good::create(
            [
                'seller_id' => 2,
                'buyer_id' => 4,
                'name' => 'good3',
                'price' => 100,
                'date' => '2019-08-16',
            ]
        ); 
        Good::create(
            [
                'seller_id' => 4,
                'buyer_id' => 2,
                'name' => 'good4',
                'price' => 117.44,
                'date' => '2019-08-23',
            ]
        ); 
        Good::create(
            [
                'seller_id' => 5,
                'buyer_id' => 6,
                'name' => 'good5',
                'price' => 34,
                'date' => '2019-08-30',
            ]
        );  
        Good::create(
            [
                'seller_id' => 6,
                'buyer_id' => 5,
                'name' => 'good6',
                'price' => 24.8,
                'date' => '2019-09-01',
            ]
        );                                    
    }
}
