<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class producto extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'productos_id');
    }
    
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categorias_id');
    }

    public function scopeSearch($query, $valor){
        return $query->where('nombre', 'like', "%$valor%")
                ->orwhere('descripcion', 'like', "%$valor%")
                ->orwhere('categorias_id', 'like', "%$valor%");
    }

    public function scopeSearchCategory($query, $valor){
        return $query->where('categorias_id', 'like', "%$valor%");
    }
}