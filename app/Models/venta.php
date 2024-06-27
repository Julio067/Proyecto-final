<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta extends Model
{
    use HasFactory;
    protected $fillable = [
        'comprador_id',
        'producto_id', 
        'cantidad', 
        'precio_total'
    ];

    public function comprador()
    {
        return $this->belongsTo(User::class, 'comprador_id');
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }
}
