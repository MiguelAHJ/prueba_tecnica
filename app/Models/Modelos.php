<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Modelos extends Model
{
    protected $table = 'modelos';

    protected $primaryKey = 'id_modelo';

    protected $fillable = [
        'nombre',
        'id_marca',
        'activo',
    ];

    public function marca()
    {
        return $this->belongsTo(Marcas::class, 'id_marca');
    }

    public function carros()
    {
        return $this->hasMany(Carros::class, 'id_modelo');
    }

    public function getNombreFormattedAttribute(): string
    {
        return (fn() => ucwords(strtolower($this->attributes['nombre'])))();
    }

    public function setNombreAttribute(string $value): void
    {
        $this->attributes['nombre'] = (fn($val) => strtoupper($val))($value);
    }

    protected function nombre(): Attribute
    {
        return new Attribute(
            set: fn($value) => strtoupper($value),
            get: fn($value) => ucwords(strtolower($value)),
        );
    }
}
