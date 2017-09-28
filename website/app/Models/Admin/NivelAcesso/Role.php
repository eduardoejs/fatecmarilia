<?php

namespace App\Models\Admin\NivelAcesso;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Users\User;

class Role extends Model
{
    protected $fillable = ['name', 'description', 'slug'];

    /**
     * Relacionamento NxN entre Role e Permission
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function permissions()
    {
      return $this->belongsToMany(Permission::class);
    }

    /**
     * Método setPermission faz o attach da permission passada como parâmetro diretamente pelo objeto de Role.
     * Ex.: $role = Role::find(1);
     *      $permission = Permission::find(1);
     *      $role->setPermission($permission);
     * @param Permission $permission
     */
    public function setPermission(Permission $permission)
    {
      return $this->permissions()->attach($permission);
    }

    /**
     * Método setPermission faz o detach da permission passada como parâmetro diretamente pelo objeto de Role.
     * Ex.: $role = Role::find(1);
     *      $permission = Permission::find(1);
     *      $role->setPermission($permission);
     * @param Permission $permission
     * @return int
     */
    public function unsetPermission(Permission $permission)
    {
      return $this->permissions()->detach($permission);
    }    
}
