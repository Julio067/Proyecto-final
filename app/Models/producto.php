<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    public function scopeSearch($query, $valor){
        return $query->where('nombre', 'like', "%$valor%")
                ->orwhere('descripcion', 'like', "%$valor%")
                ->orwhere('categoria', 'like', "%$valor%");
    }
}
