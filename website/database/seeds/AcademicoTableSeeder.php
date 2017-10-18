<?php

use Illuminate\Database\Seeder;
use App\Models\Admin\Academico\TipoCurso;
use App\Models\Admin\Academico\ModalidadeCurso;
use App\Models\Admin\Academico\Curso;
use App\Models\Admin\Academico\GradeDisciplina;
use App\Models\Admin\Academico\Disciplina;

class AcademicoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tipo_cursos')->delete();
        TipoCurso::create(['descricao' => 'Graduação']);
        TipoCurso::create(['descricao' => 'Pós-Graduação']);

        DB::table('modalidade_cursos')->delete();
        ModalidadeCurso::create(['descricao' => 'Presencial']);
        ModalidadeCurso::create(['descricao' => 'Ensino à Distância (EaD)']);

        DB::table('cursos')->delete();

        $tipoCurso = TipoCurso::find(1);
        $modalidadeCurso = ModalidadeCurso::find(1);

        $curso = new Curso();
        $curso->nome = 'Tecnologia em Alimentos';
        $curso->cargaHoraria = 2800;
        $curso->duracao = 42;
        $curso->tipoCurso()->associate($tipoCurso);
        $curso->modalidadeCurso()->associate($modalidadeCurso);
        $curso->save();

        $tipoCurso = TipoCurso::find(1);
        $modalidadeCurso = ModalidadeCurso::find(2);

        $curso = new Curso();
        $curso->nome = 'Tecnologia em Gestão Empresarial';
        $curso->cargaHoraria = 2800;
        $curso->duracao = 42;
        $curso->tipoCurso()->associate($tipoCurso);
        $curso->modalidadeCurso()->associate($modalidadeCurso);
        $curso->save();

        DB::table('grade_disciplinas')->delete();
        GradeDisciplina::create(['codigo_siga' => 'ALM201701130', 'descricao' => 'Grade atual do curso de alimentos']);
        GradeDisciplina::create(['codigo_siga' => 'GEP201701130', 'descricao' => 'Grade atual do curso de gestão']);

        DB::table('disciplinas')->delete();
        Disciplina::create(['nome' => 'Bioquímica dos Alimentos', 'cargaHoraria' => 45, 'semestre' => 1, 'codigo_siga' => 'BQA0120', 'grade_disciplina_id' => 1, 'curso_id' => 1]);
    }
}
