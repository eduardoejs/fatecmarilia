<?php

namespace App\Models\Admin\Instituicao;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Users\User;

class Cargo extends Model
{
    protected $fillable = ['nome', 'nivel', 'categoria'];

    /**
     * Relacionamento Inverso 1xN entre a tabela de Users com a tabela de cargos
     */
    public function users()
    {
      return $this->hasMany(User::class);
    }
}
