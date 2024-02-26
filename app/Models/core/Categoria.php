<?php

namespace App\Models\core;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{  
    use HasFactory;
    use SoftDeletes;

    protected $table="categorias";
    protected $primaryKey="categoria_id";

    protected $fillable=[
        "categoria_id",
        "designacao",
    ];

    public function produtos()
    {
        return $this->hasMany('App\Models\core\Produto','produto_id','produto_id');
    }
}
