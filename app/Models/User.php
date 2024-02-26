<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


use \DB;
use \Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'pessoa_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pessoa()
    {
        return $this->belongsTo('App\Models\rh\Pessoa','pessoa_id','pessoa_id');
    }

    public function carrinho()
    {
        return $this->hasMany('App\Models\core\Carrinho','carrinho_id','carrinho_id');
    }

    public function pedidos()
    {
        return $this->hasMany('App\Models\core\Pedido','pedido_id','pedido_id');
    }

    public function roles_relashionship()
    {
        return $this->BelongsToMany(Role::class,'user_roles');
    }


     /*USER PERMISSIONS START */

     public function roles()
     {
         $roles = DB::table('users')
             ->join('user_roles', 'user_roles.user_id', 'users.id')
             ->join('roles', 'roles.id', 'user_roles.role_id')
             ->where('user_roles.user_id', Auth::user()->id);

         return $roles;
     }

     public function authorizeRoles($roles)
     {
         if ($this->hasRole($roles)) {
             return true;
         }
         abort(401, 'Não tens autorização para esta acção');
     }

     public function hasAnyRole($roles)
     {
         if (is_array($roles)) {
             foreach ($roles as $role) {
                 if ($this->hasRole($role)) {
                     return true;
                 }
             }
         } else {
             if ($this->hasRole($roles)) {
                 return true;
             }
         }
         return false;
     }

     public function hasRole($role)
     {
         if ($this->roles()->where('nome', $role)->first()) {
             return true;
         }

         return false;
     }
     /*USER PERMISSIONS END*/

}
