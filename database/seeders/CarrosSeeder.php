<?php

namespace Database\Seeders;

use App\Models\Carros;
use App\Models\Modelos;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Exception;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class CarrosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $modelos = [
            1 => ['CLIO', 'MEGANE'],
            2 => ['PALIO', 'ARGO'],
            3 => ['CAMARO', 'MALIBU'],
            4 => ['POLO', 'TIGUAN'],
            5 => ['SENTRA', 'MURANO'],
            6 => ['COROLLA', 'CAMRY'],
            7 => ['MAZDA3', 'MAZDA6'],
            8 => ['CIVIC', 'ACCORD'],
            9 => ['SUZUKI', 'SWIFT'],
            10 => ['MIRAGE', 'LANCER']
        ];

        // Definir los posibles valores para algunos campos
        $colores = ['Rojo', 'Azul', 'Negro', 'Blanco', 'Gris'];
        $anios = range(2010, 2025);
        $kilometrajes = range(10000, 200000, 10000);
        $precios = range(5000, 50000, 5000);

        foreach ($modelos as $marca_id => $modelosArray) {
            foreach ($modelosArray as $nombreModelo) {
                $modelo = Modelos::where('nombre', $nombreModelo)->first();

                $imagePath = $this->generateRandomImage($nameFileName = Str::random(10));

                Carros::firstOrCreate([
                    'id_marca' => $marca_id,
                    'id_modelo' => $modelo->id_modelo,
                    'anio' => $anios[array_rand($anios)],
                    'color' => $colores[array_rand($colores)],
                    'precio' => $precios[array_rand($precios)],
                    'kilometraje' => $kilometrajes[array_rand($kilometrajes)],
                    'img_path' => $imagePath
                ]);
            }
        }
        
    }

    private function generateRandomImage($nameFileName)
    {
        $path = storage_path('app/public/cars/');
        
        // Asegúrate de que el directorio existe
        if (!is_dir($path)) {
            mkdir($path, 0777, true);
        }

        $imageUrl = 'https://picsum.photos/640/480';
        $imagePath = $path . $nameFileName . '.jpg'; // Cambia jpg si necesitas otro formato

        try {
            $imageContent = file_get_contents($imageUrl);
            file_put_contents($imagePath, $imageContent);
        } catch (Exception $e) {
            return null;
        }

        return 'storage/cars/' . $nameFileName . '.jpg';
    }
}
