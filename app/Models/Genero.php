<?php

namespace App\Models;

use App\Models\Empleado;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Genero extends Model
{

    use HasFactory;

    protected $fillable = ['cod_genero', 'des_genero'];

    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
    
}
