<?php

namespace Database\Seeders;

use App\Models\Modelos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modelos = [
            1 => ['Clio', 'Megane'],
            2 => ['Palio', 'Argo'],
            3 => ['Camaro', 'Malibu'],
            4 => ['Polo', 'Tiguan'],
            5 => ['Sentra', 'Murano'],
            6 => ['Corolla', 'Camry'],
            7 => ['Mazda3', 'Mazda6'],
            8 => ['Civic', 'Accord'],
            9 => ['Suzuki', 'Swift'],
            10 => ['Mirage', 'Lancer']
        ];
        
        foreach ($modelos as $id_marca => $modelosArray) {
            foreach ($modelosArray as $modelo) {
                Modelos::firstOrCreate([
                    'nombre' => $modelo,
                    'id_marca' => $id_marca
                ]);
            }
        }
    }
}
