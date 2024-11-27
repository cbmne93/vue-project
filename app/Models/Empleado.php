<?php

namespace App\Models;

use App\Models\Cargo;
use App\Models\Genero;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{
    use HasFactory;

    protected $fillable = ['cedula', 'nombre', 'apellido', 'image', 'cargo_id', 'genero_id'];


    public function cargo()
    {
        return $this->belongsTo(Cargo::class);
    }

    public function genero()
    {
        return $this->belongsTo(Genero::class);
    }

    public function getImageUrl()
    {
        return URL::asset("images/empleado/" . $this->image);
    }
}
