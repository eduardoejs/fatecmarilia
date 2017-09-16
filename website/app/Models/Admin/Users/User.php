<?php

namespace App\Models\Admin\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\NivelAcesso\Role;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'plainPassword', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'plainPassword',
    ];

    // Relacionamento entre a tabela de Users com a tabela de Roles
    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }

    public function setRole($role)
    {
        if(is_string($role)){
          return $this->roles()->attach(Role::whereSlug($role)->firstOrFail());
        }
        return $this->roles()->attach(Role::whereSlug($role->slug)->firstOrFail());
    }

    public function unsetRole($role)
    {
        if(is_string($role)){
          return $this->roles()->detach(Role::whereSlug($role)->firstOrFail());
        }
        return $this->roles()->detach($role);
    }

    public function hasRole($role)
    {
        if(is_string($role)){
          return $this->roles->contains('slug', $role);//e o método contains determina se a collection (this->roles) contém um determinado item retornando true ou false
        }
        return $role->intersect($this->roles)->count();//O método intersect remove todos os valores da coleção original que não estão presentes na matriz ou coleção fornecida. A coleção resultante preservará as chaves da coleção original
    }

    public function isAdmin()
    {
        return $this->hasRole('administrador');
    }    
}
