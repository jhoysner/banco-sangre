<?php

namespace Database\Seeders;

use App\Models\Prueba;
use Illuminate\Database\Seeder;

class PruebaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   

        $items = [
            ['descripcion' => 'Sida (VIH)'],
            ['descripcion' => 'Virus (HTLV I/II)'],
            ['descripcion' => 'Antígeno de Superficie (HBsAg)'],
            ['descripcion' => 'Core (HBcAb)'],
            ['descripcion' => 'Hepatitis C (HCV)'],
            ['descripcion' => 'Sífilis'],
            ['descripcion' => 'Chagas'],
         
        ];


        
        foreach ($items as $item) {
            Prueba::updateOrCreate(['descripcion' => $item['descripcion']], $item);
        }
    }
}
