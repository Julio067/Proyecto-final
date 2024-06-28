<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria extends Model
{
    use HasFactory;
    public function user(){
        return $this->belongsTo(producto::class,'categorias_id');
    }

    public function productos()
    {
        return $this->hasMany(producto::class, 'categorias_id');
    }
}
