<?php

namespace App\Livewire;

use App\Models\Carros;
use Livewire\Component;

class ColeccionDeAutos extends Component
{
    public function render()
    {
        $carros = Carros::all();
        return view('livewire.coleccion-de-autos', compact('carros'));
    }
}
