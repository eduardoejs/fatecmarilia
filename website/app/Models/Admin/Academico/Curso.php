<?php

namespace App\Models\Admin\Academico;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Users\Aluno;

class Curso extends Model
{
    protected $fillable = ['nome', 'cargaHoraria', 'duracao', 'tipo_curso_id', 'modalidade_curso_id'];

    public function tipoCurso()
    {
      return $this->belongsTo(TipoCurso::class);
    }

    public function modalidadeCurso()
    {
      return $this->belongsTo(ModalidadeCurso::class);
    }

    public function disciplinas()
    {
      return $this->hasMany(Disciplina::class);
    }

    public function alunos()
    {
      return $this->hasMany(Aluno::class);
    }
}
