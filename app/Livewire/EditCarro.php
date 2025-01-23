<?php

namespace App\Livewire;

use App\Livewire\Forms\carros\editForm;
use App\Models\Marcas;
use App\Models\Modelos;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditCarro extends Component
{
    use WithFileUploads;

    public editForm $editForm;
    public $carro;

    public function back(){
        return redirect()->route('dashboard');
    }

    public function update(){
        $this->editForm->carro = $this->carro;
        $this->editForm->store();
    }

    public function mount($carro)
    {
        $this->carro = $carro;
        $this->editForm->marca = $carro->id_marca;
        $this->editForm->modelo = $carro->id_modelo;
        $this->editForm->anio = $carro->anio;
        $this->editForm->color = $carro->color;
        $this->editForm->precio = $carro->precio;
        $this->editForm->kilometraje = $carro->kilometraje;
    }

    public function render()
    {
        $marcas = Marcas::all();
        $modelos = Modelos::all();
        
        return view('livewire.edit-carro', compact('marcas', 'modelos'));
    }
}
