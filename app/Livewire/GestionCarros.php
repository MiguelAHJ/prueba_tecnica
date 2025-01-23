<?php

namespace App\Livewire;

use App\Livewire\Forms\carros\createForm as CarrosCreateForm;
use App\Livewire\Forms\createForm;
use App\Models\Carros;
use Livewire\Component;
use Livewire\WithPagination;

class GestionCarros extends Component
{
    use WithPagination;

    public CarrosCreateForm $createForm;

    public $search;
    public $perPage = 10;
    public $sortBy = 'id_carro';
    public $sortDir = 'ASC';

    public function changeEstatus(Carros $carro)
    {
        $carro->update([
            'activo' => !$carro->activo
        ]);

        $this->resetPage();
        //$this->dispatch('alertSuccess', title: 'Actualizado con éxito!');
    }

    public function create(){
        return redirect()->route('carros.create');
    }

    public function delete(Carros $carro){
        $carro->delete();
    }

    public function edit(Carros $carro){
        return redirect()->route('carros.edit', $carro);
    }

    public function render()
    {
        $carros = Carros::when($this->search, function ($query) {
            $query->whereHas('marca', function ($q) {
                $q->where('nombre', 'LIKE', '%' . strtoupper($this->search) . '%');
            })->orWhereHas('modelo', function ($q) {
                $q->where('nombre', 'LIKE', '%' . strtoupper($this->search) . '%');
            });
        })
        ->orderBy($this->sortBy, $this->sortDir)
        ->paginate($this->perPage);
        //dd($carros);
        return view('livewire.gestion-carros', compact('carros'));
    }
}
