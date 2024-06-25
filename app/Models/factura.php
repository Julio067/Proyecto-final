<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class factura extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'producto_id',
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
