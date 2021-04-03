<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Warranty;

class WarrantySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Warranty::create([
            'id' => '1',
            'warranty_name' => 'Sem garantia'
        ]);

        Warranty::create([
            'id' => '2',
            'warranty_name' => 'Semi garantia'
        ]);

        Warranty::create([
            'id' => '3',
            'warranty_name' => 'Garantia parcial'
        ]);

        Warranty::create([
            'id' => '4',
            'warranty_name' => 'Garantia integral'
        ]);
    }
}
