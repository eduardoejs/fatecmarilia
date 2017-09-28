<?php

namespace App\Models\Admin\NivelAcesso;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable = ['name', 'description', 'slug'];

    /**
     * Relacionamento NxN entre Permission e Role
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
      return $this->belongsToMany(Role::class);
    }
}
