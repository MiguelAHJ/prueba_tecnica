<?php

namespace App\Http\Controllers;

use App\Models\Carros;
use Illuminate\Http\Request;

class CarrosController extends Controller
{
    public function edit(Carros $carro)
    {
        return view('carros.edit', compact('carro'));
    }

    public function create()
    {
        return view('carros.create');
    }
}
