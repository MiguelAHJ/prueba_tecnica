<?php

namespace Database\Seeders;

use App\Models\Marcas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marcas = [
            'Renault',
            'Fiat',
            'Chevrolet',
            'Volkswagen',
            'Nissan',
            'Toyota',
            'Mazda',
            'Honda',
            'Suzuki',
            'Mitsubishi'
        ];

        foreach ($marcas as $marca) {
            Marcas::firstOrCreate([
                'nombre' => $marca
            ]);
        }
    }
}
