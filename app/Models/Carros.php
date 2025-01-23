<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Carros extends Model
{
    protected $table = 'carros';

    protected $primaryKey = 'id_carro';

    protected $fillable = [
        'id_marca', 
        'id_modelo', 
        'anio', 
        'color', 
        'precio', 
        'kilometraje', 
        'img_path', 
        'activo',
    ];

    public function marca()
    {
        return $this->belongsTo(Marcas::class, 'id_marca');
    }

    public function modelo()
    {
        return $this->belongsTo(Modelos::class, 'id_modelo');
    }

    protected function nombre(): Attribute
    {
        return new Attribute(
            set: fn($value) => strtoupper($value),
            get: fn($value) => ucwords(strtolower($value)),
        );
    }
}
