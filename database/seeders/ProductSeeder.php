<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $min = 100; $max = 200;
        $data = array(
                    array(
                        'name' => 'Chair',
                        'price' => '100.00',
                        'description' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
                        'status' => 'active'
                    ),
                    array(
                        'name' => 'Laptop',
                        'price' => '200.00',
                        'description' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
                        'status' => 'active'
                    ),
                    array(
                            'name' => 'Keyboard',
                            'price' => '100.00',
                            'description' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
                            'status' => 'active'
                        ),
                    array(
                        'name' => 'Mourse',
                        'price' => '300.00',
                        'description' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
                        'status' => 'active'
                    ),
                    array(
                        'name' => 'Laptop Charger',
                        'price' => '1000.00',
                        'description' => "Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries",
                        'status' => 'active'
                    )
               );
        
        foreach($data as $item) {
             Product::create($item);
        }  
    }
}
