<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'correo',
        'direccion',
        'codigo_postal',
        'metodo_pago',
        'producto_id',
        'especificaciones',
        'medida',
        'cantidad_compra',
        'total',
    ];
    
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public function usuario(){
        return $this->belongsTo(user::class, 'user_id');
    }

}
