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
    
    public function categorias(){
        return $this->hasMany(categoria::class,'productos_id');
    }

    public function scopeSearch($query, $valor){
        return $query->where('nombre', 'like', "%$valor%")
                ->orwhere('descripcion', 'like', "%$valor%");
    }
    public function ventas()
    {
        return $this->hasMany(venta::class, 'producto_id');
    }
}
