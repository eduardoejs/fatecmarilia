<?php

namespace App\Models\Admin\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\NivelAcesso\Role;
use App\Models\Admin\Academico\Curso;


class ExAluno extends Authenticatable
{
    use Notifiable;

    protected $guard = 'exaluno';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'matricula', 'cpf', 'email', 'password', 'status', 'sexo', 'role_id', 'curso_id',
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
     * Relacionamento NxN entre a tabela de Alunos com a tabela de Roles
     */
    public function roles()
    {
      ////O segundo parâmetro informo o nome da tabela pivot
      return $this->belongsToMany(Role::class, 'role_exaluno');
    }

    /**
     * Relacionamento 1xN entre a tabela de Alunos com a tabela de Cursos
     */
    public function curso()
    {
      return $this->belongsTo(Curso::class);
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

    /**
     * Método setRole faz o associate (associação) da role passada como parâmetro diretamente pelo objeto de Aluno.
     * Ex.:
     *      $aluno = Aluno::find(1);
     *      $curso = Curso::find(1);
     *      $aluno->curso()->associate($curso);
     *      $aluno->save();
     * @param $curso
     */
    public function setCurso(Curso $curso)
    {
      return $this->curso()->associate($curso);
    }

    /**
     * Método unsetRole faz o dissociate (desassociação) da role passada como parâmetro diretamente pelo objeto de Aluno.
     * Ex.:
     *      $aluno = Aluno::find(1);
     *      $aluno->curso()->dissociate();
     *      $aluno->save();
     */
    public function unsetCurso()
    {
      return $this->curso()->dissociate();
    }

}
