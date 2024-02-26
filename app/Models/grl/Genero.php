<?php

namespace App\Models\grl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genero extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="generos";
    protected $primaryKey="genero_id";

    protected $fillable=[
        "genero_id",   
        "designacao",
    ];

    public function pessoas()
    {
        return $this->hasMany('App\Models\rh\Pessoa','pessoa_id','pessoa_id');
    }
}
