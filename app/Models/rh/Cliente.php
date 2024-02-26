<?php

namespace App\Models\rh;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{  
    use HasFactory;
    use SoftDeletes;

    protected $table="clientes";
    protected $primaryKey="cliente_id";

    protected $fillable=[
        "cliente_id",
        "pessoa_id"
    ];

    public function pessoa()
    {
        return $this->belongsTo('App\Models\rh\Pessoa','pessoa_id','pessoa_id');
    }

    public function pedidos()
    {
        return $this->hasMany('App\Models\core\Pedido','pedido_id','pedido_id');
    }

    public function venda()
    {
        return $this->hasOne('App\Models\core\Venda','venda_id','venda_id');
    }
}
