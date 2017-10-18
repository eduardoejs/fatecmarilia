<?php

namespace App\Models\Admin\Academico;

use Illuminate\Database\Eloquent\Model;

class GradeDisciplina extends Model
{
    protected $fillable = ['codigo_siga', 'descricao'];

    public function disciplinas()
    {
      return $this->hasMany(Disciplina::class);
    }
}
