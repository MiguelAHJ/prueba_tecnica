<?php

namespace App\Livewire;

use App\Livewire\Forms\carros\createForm;
use App\Models\Marcas;
use App\Models\Modelos;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreateCarro extends Component
{
    use WithFileUploads;

    public createForm $createForm;

    public function back(){
        return redirect()->route('dashboard');
    }

    public function create(){
        $this->createForm->store();
    }

    public function render()
    {
        $marcas = Marcas::all();
        $modelos = Modelos::all();
        return view('livewire.create-carro' , compact('marcas', 'modelos'));
    }
}
