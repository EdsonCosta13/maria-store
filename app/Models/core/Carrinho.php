<?php

namespace App\Models\core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carrinho extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="carrinhos";
    protected $primaryKey="carrinho_id";

    protected $fillable=[
        "carrinho_id",
        "usuario_id",
        "status",
        "total",
    ];

    public function itens()
    {
        return $this->hasMany('App\Models\core\CarrinhoItem','carrinho_item_id','carrinho_item_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

}
