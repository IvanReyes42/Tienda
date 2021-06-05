<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //
    protected $fillable = ['Imagen'];

    //Scope
    public function scopeCategoria($query, $Categoria)
    {
        if ($Categoria)
            return $query->where('Categoria',$Categoria);

    }

}
