<?php

namespace App\Models\core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ItemPedido extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="item_pedidos";
    protected $primaryKey="item_pedido_id";

    protected $fillable=[
        "item_pedido_id",
        "quantidade",
        "produto_id",
        "pedido_id",

    ];

    public function pedido()
    {
        return $this->belongsTo('App\Models\core\Pedido','pedido_id','pedido_id');
    }

    public function produto()
    {
        return $this->belongsTo('App\Models\core\Produto','produto_id','produto_id');
    }

}
