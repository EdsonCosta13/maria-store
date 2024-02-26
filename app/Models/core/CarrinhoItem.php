<?php

namespace App\Models\core; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarrinhoItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="carrinho_items";
    protected $primaryKey="carrinho_item_id";

    protected $fillable=[
        "carrinho_item_id",
        "quantidade",
        "preco_unitario",
        "produto_id",
        "carrinho_id"
    ];

    public function produto()
    {
        return $this->belongsTo('App\Models\core\Produto','produto_id','produto_id');
    }

    public function carrinho()
    {
        return $this->belongsTo('App\Models\core\Carrinho','carrinho_id','carrinho_id');
    }

}
