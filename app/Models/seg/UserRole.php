<?php

namespace App\Models\seg;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserRole extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table="user_roles";

    protected $fillable=
    [
        'user_id',
        'role_id',
    ];
}
