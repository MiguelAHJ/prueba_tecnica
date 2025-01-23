<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Marcas extends Model
{
    protected $table = 'marcas';

    protected $primaryKey = 'id_marca';

    protected $fillable = [
        'marca',
        'activo',
    ];

    public function modelos()
    {
        return $this->hasMany(Modelos::class, 'id_marca');
    }

    public function carros()
    {
        return $this->hasMany(Carros::class, 'id_marca');
    }

    //accesor y mutador
    public function getActivoAttribute($value)
    {
        return $value ? 'Activo' : 'Inactivo';
    }
    

    protected function nombre(): Attribute
    {
        return new Attribute(
            set: fn($value) => strtoupper($value),
            get: fn($value) => ucwords(strtolower($value)),
        );
    }
}
