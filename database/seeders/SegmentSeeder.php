<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ClientSegment;

class SegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ClientSegment::create([
            'id' => '1',
            'segment_name' => 'Comércio'
        ]);

        ClientSegment::create([
            'id' => '2',
            'segment_name' => 'Serviços'
        ]);

        ClientSegment::create([
            'id' => '3',
            'segment_name' => 'Indústria'
        ]);

        ClientSegment::create([
            'id' => '4',
            'segment_name' => 'Outros'
        ]);
    }
}
