<?php

namespace App\Models\Admin\NivelAcesso;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Users\User;

class Role extends Model
{
    protected $fillable = ['name', 'description', 'slug'];

    public function permissions()
    {
      return $this->belongsToMany(Permission::class);
    }

    public function setPermission(Permission $permission)
    {
      return $this->permissions()->attach($permission);
    }

    public function unsetPermission(Permission $permission)
    {
      return $this->permissions()->detach($permission);
    }    
}
