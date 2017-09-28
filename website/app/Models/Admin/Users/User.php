<?php

namespace App\Models\Admin\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\NivelAcesso\Role;
use App\Events\NewUser;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status',
    ];

    protected $events = [
        'created' => NewUser::class,
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relacionamento NxN entre a tabela de Users com a tabela de Roles
     */
    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }

    /**
     * Método setRole faz o attach da role passada como parâmetro diretamente pelo objeto de User.
     * Ex.: $user = User::find(1);
     *      $role = Role::whereName('ADMINISTRADOR')->first();
     *      $user->setRole($role);
     * @param $role
     */
    public function setRole($role)
    {
        if(is_string($role)){
          return $this->roles()->attach(Role::whereSlug($role)->firstOrFail());
        }
        return $this->roles()->attach(Role::whereSlug($role->slug)->firstOrFail());
    }

    /**
     * Método unsetRole faz o detach da role passada como parâmetro diretamente pelo objeto de User
     * Ex.: $user = User::find(1);
     *      $role = Role::whereName('ADMINISTRADOR')->first();
     *      $user->unsetRole($role);
     * @param $role
     * @return int
     */

    public function unsetRole($role)
    {
        if(is_string($role)){
          return $this->roles()->detach(Role::whereSlug($role)->firstOrFail());
        }
        return $this->roles()->detach($role);
    }

    /**
     * Método hasRole verifica de o User possui uma Role associada
     * @param $role
     * @return mixed
     */
    public function hasRole($role)
    {
        if(is_string($role)){
            //O método contains determina se a collection (this->roles) contém um determinado
            // item retornando true ou false
            return $this->roles->contains('slug', $role);
        }
        //O método intersect remove todos os valores da coleção original que não estão presentes
        // na matriz ou coleção fornecida. A coleção resultante preservará as chaves da coleção original
        return $role->intersect($this->roles)->count();
    }

    /**
     * Método isAdmin retorna a role administrador
     * @return mixed
     */
    public function isAdmin()
    {
        return $this->hasRole('administrador');
    }    
}
