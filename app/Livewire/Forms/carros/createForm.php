<?php

namespace App\Livewire\Forms\carros;

use App\Models\Carros;
use Livewire\Attributes\Validate;
use Livewire\Form;

class createForm extends Form
{
    public $marca;

    public $modelo;

    #[Validate(['numeric', 'min:1900'])]
    public $anio;

    #[Validate(['max:20'])]
    public $color;

    #[Validate(['numeric', 'min:0'])]
    public $precio;

    #[Validate(['numeric', 'min:0'])]
    public $kilometraje;

    public $img;

    public function store(){

        $this->validate();

        $img_path = $this->uploadImage();

        Carros::create([
            'id_marca' => $this->marca,
            'id_modelo' => $this->modelo,
            'anio' => $this->anio,
            'color' => $this->color,
            'precio' => $this->precio,
            'kilometraje' => $this->kilometraje,
            'img_path' => $img_path
        ]);

        return redirect()->route('dashboard');
    }

    public function uploadImage()
    {    
        $filePath = $this->img->store('cars');
        $this->reset('img');
        return 'storage/'.$filePath;
    }
}
