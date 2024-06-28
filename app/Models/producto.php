<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class, 'productos_id');
    }

    public function categoria()
    {
        return $this->belongsTo(categoria::class, 'categorias_id');
    }

    public function scopeSearch($query, $valor)
    {
        return $query->where('nombre', 'like', "%$valor%")
                     ->orWhere('descripcion', 'like', "%$valor%")
                     ->orWhereHas('categoria', function($cate) use ($valor) {
                         $cate->where('nombre', 'like', "%$valor%");
                     });
    }
}