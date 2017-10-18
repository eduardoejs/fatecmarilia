<?php

namespace App\Models\Admin\Academico;

use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\Users\User;

class Disciplina extends Model
{
    protected $fillable = ['nome', 'cargaHoraria', 'semestre', 'codigo_siga', 'grade_disciplina_id', 'curso_id'];

    public function users()
    {
      return $this->belongsToMany(User::class);
    }

    //Set Docente mas na verdade pega os dados de USER
    public function setDocente(User $user)
    {
      return $this->users()->attach($user);
    }

    public function unsetDocente(User $user)
    {
      return $this->users()->detach($user);
    }

    public function gradeDisciplina()
    {
      return $this->belongsTo(GradeDisciplina::class);
    }

    public function curso()
    {
      return $this->belongsTo(Curso::class);
    }
}
