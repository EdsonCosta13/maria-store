<?php

namespace App\Models\seg;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="roles";
    protected $fillable=['nome','descricao'];

    public function users()
    {
        return $this->BelongsToMany(User::class,'user_roles');
    }
}
