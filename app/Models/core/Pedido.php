<?php

namespace App\Models\core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pedido extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="pedidos";
    protected $primaryKey="pedido_id";

    protected $fillable=[
        "pedido_id",
        "referencia",
        "data",
        "hora",
        "estado",
        "total",
        "metodo_pagamento",
        "usuario_id"  
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    public function itens()
    {
        return $this->hasMany( 'App\Models\core\ItemPedido','item_pedido_id','item_pedido_id');
    }
}
