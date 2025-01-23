<?php

namespace App\Livewire\Forms\carros;

use App\Models\Carros;
use Livewire\Attributes\Validate;
use Livewire\Form;

class editForm extends Form
{
    public $carro;

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

        Carros::where('id_carro', $this->carro->id_carro)->update([
            'id_marca' => $this->marca,
            'id_modelo' => $this->modelo,
            'anio' => $this->anio,
            'color' => $this->color,
            'precio' => $this->precio,
            'kilometraje' => $this->kilometraje,
        ]);

        if($this->img){
            $this->uploadImage();
        }

        return redirect()->route('dashboard');
    }

    public function uploadImage()
    {    
        $filePath = $this->img->store('cars');

        $this->carro->img_path = 'storage/'.$filePath;
        $this->carro->save();

        $this->reset('img');
    }
}
