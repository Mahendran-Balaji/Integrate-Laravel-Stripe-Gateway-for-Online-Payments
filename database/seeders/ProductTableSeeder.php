<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Products;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Products::create([
            'name' => 'Samsung Galaxy S20',
            'description' => '(Cloud Blue, 128 GB)  (8 GB RAM)',
            'price' => '74000'
        ]);

        Products::create([
            'name' => 'Samsung Galaxy Note 20 Ultra 5G',
            'description' => '(Mystic Black, 256 GB)  (12 GB RAM)',
            'price' => '104999'
        ]);
    }
}
