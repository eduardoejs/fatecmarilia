<?php

namespace App\Models\Admin\Users;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Admin\NivelAcesso\Role;
use App\Models\Admin\Academico\Curso;


class Aluno extends Authenticatable
{
    use Notifiable;

    protected $guard = 'aluno';

    protected $fillable = [
        'nome', 'matricula', 'cpf', 'email', 'password', 'termo', 'turno', 'status', 'trancado', 'sexo', 'curso_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Relacionamento NxN entre a tabela de Alunos com a tabela de Roles
     */
    public function roles()
    {
      //O segundo parâmetro informo o nome da tabela pivot
      return $this->belongsToMany(Role::class, 'role_aluno');
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
}
