<?php

namespace Piccolino\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Piccolino\Grupo;
use Piccolino\http\Requests\GrupoFormRequest;
use Piccolino\MatriculaGrupo;
use Piccolino\MateriaGrupo;

class GrupoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Muestra la lista de los grupos activos en el sistema
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $Grupo = \DB::table("grupo as gr")
                ->leftjoin('sede AS se', 'se.id', "=", 'gr.id_sede')
                ->leftjoin('semestre AS sem', 'sem.id', "=", 'gr.id_semestre')
                ->leftjoin('persona AS pe', 'pe.id', "=", 'gr.id_persona_responsable')
                ->leftjoin('estado AS est', 'est.id', "=", 'gr.id_estado')
                ->select('gr.*', 'se.nombre as nombresede', 'sem.codigo as codigosemestre', 'pe.nombre as nombreresponsable', 'est.nombre as nombreestado')
            //->where('gr.id_estado', '=', '1')
                ->where('gr.codigo', 'LIKE', '%' . $query . '%')
                ->orderBy('gr.id', 'desc')
                ->paginate(7);
            return view('grupo.index', ['Grupo' => $Grupo, 'searchText' => $query]);
        }

    }

/**
 * Consulta los datos necesarios para el registro del grupo
 */
    public function create()
    {
        $Sede = \DB::table("sede")->where('estado', '=', '1')->get();
        $Semestre = \DB::table("semestre")->where('estado', '=', '1')->get();
        $Persona = \DB::table("persona")->where('id_tipo_persona', '=', '2')->get();
        return view('grupo.create', ['Sede' => $Sede, 'Semestre' => $Semestre, 'Persona' => $Persona]);
    }
    /**
     * Registrar grupo
     */
    public function store(GrupoFormRequest $request)
    {
        try {
            $now = new \DateTime();
            $Grupo = new Grupo();
            $Grupo->codigo = $request->get('codigo');
            $Grupo->id_sede = $request->get('sede');
            $Grupo->id_semestre = $request->get('semestre');
            $Grupo->id_persona_responsable = $request->get('personaresponsable');
            $Grupo->id_estado = 1;
            $Grupo->fecha_registro = $now;
            $Grupo->id_usuario_registro = auth()->user()->id;
            $Grupo->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('grupo');
    }
    /**
     * Muestra los datos del grupo segun su id
     */

    public function show($id)
    {
        $Grupo = Grupo::findOrdFail($id);
        return view('grupo.show', ['Grupo' => $Grupo]);
    }
    // Redirige a la vista de edicion
    public function edit($id)
    {
        $Grupo = Grupo::findOrfail($id);
        $Sede = \DB::table("sede")->where('estado', '=', '1')->get();
        $Semestre = \DB::table("semestre")->where('estado', '=', '1')->get();
        $Persona = \DB::table("persona")->where('id_tipo_persona', '=', '2')->get();
        $Estado = \DB::table("estado")->get();
        return view('grupo.edit', ['Grupo' => $Grupo, 'Sede' => $Sede, 'Semestre' => $Semestre, 'Persona' => $Persona, 'Estado' => $Estado]);
    }
    /**
     * Actualiza el grupo
     */

    public function update(GrupoFormRequest $request, $id)
    {
        try {
            $Grupo = Grupo::findOrfail($id);
            $Grupo->codigo = $request->get('codigo');
            $Grupo->id_sede = $request->get('sede');
            $Grupo->id_semestre = $request->get('semestre');
            $Grupo->id_persona_responsable = $request->get('personaresponsable');
            $Grupo->id_estado = $request->get('estado');
            $Grupo->update();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('grupo');
    }
    /**
     * Cambia el estado del grupo a inactivo
     */
    public function destroy($id)
    {
        $Grupo = Grupo::findOrfail($id);
        $Grupo->id_estado = 2;
        $Grupo->update();
        return Redirect::to('grupo');
    }

    /**
     * Redirige a la vista para agregar estudiantes matriculados
     */
    public function addstudent($id)
    {
        $Grupo = Grupo::findOrfail($id);
        $Matricula = \DB::table("matricula as ma")
            ->join('semestre as se', 'se.id', "=", 'ma.id_semestre')
            ->leftjoin('matricula_grupo AS mg', 'mg.id_matricula', "=", 'ma.id')
            ->leftjoin('persona AS pe', 'pe.id', "=", 'ma.id_persona')
            ->leftjoin('sede AS sed', 'sed.id', "=", 'ma.id_sede')
            ->select('ma.*', 'se.codigo as nombresemestre', 'pe.nombre as nombrepersona', 'pe.url_imagen', 'sed.nombre as nombresede')
            ->where('se.estado', '=', '1')
            ->where('ma.estado', '=', '1')
            ->where('ma.id_sede', '=', $Grupo->id_sede)
            ->whereNull('mg.id_estado')->orWhere('mg.id_estado', '<>', '1')
            ->orderBy('ma.id', 'desc')
            ->groupBy('ma.id')->get();
        return view('grupo.addstudent', ['Grupo' => $Grupo, 'Matricula' => $Matricula]);
    }
    /**
     * Asigna los estudiantes seleccionados al grupo
     */

    public function assignstudenttogroup(Request $request)
    {
        try {
            DB::beginTransaction();
            $arraymatriculas = $request->get('arraymatriculas');
            $contador = 0;
            while ($contador < count($arraymatriculas)) {
                $MatriculaGrupo = new MatriculaGrupo();
                $now = new \DateTime();
                $MatriculaGrupo->id_grupo = $request->get('idgrupo');
                $MatriculaGrupo->id_matricula = $arraymatriculas[$contador];
                $MatriculaGrupo->fecha_registro = $now;
                $MatriculaGrupo->id_estado = 1;
                $MatriculaGrupo->id_usuario_registra = auth()->user()->id;
                $MatriculaGrupo->save();
                $contador++;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return Redirect::to('info/' . $request->get('idgrupo') . '/group');

    }

    /**
     * Imprime la informacion grupo
     */
    public function infogroup($id)
    {
        $Grupo = Grupo::findOrfail($id);
        $Sede = \DB::table("sede as se")
        ->leftjoin('barrio as ba', 'ba.id', "=", 'se.id_barrio')
        ->select('se.*', 'ba.nombre as nombrebarrio')
        ->where('se.id', '=', $Grupo->id_sede)->get();
        $Semestre = \DB::table("semestre")->where('id', '=', $Grupo->id_semestre)->get();
        $Persona = \DB::table("persona")->where('id', '=', $Grupo->id_persona_responsable)->get();
        $Estado = \DB::table("estado")->where('id', '=', $Grupo->id_estado)->get();
        $Matricula = \DB::table("matricula_grupo AS mg")
            ->join('matricula AS ma', 'mg.id_matricula', "=", 'ma.id')
            ->join('semestre as se', 'se.id', "=", 'ma.id_semestre')
            ->leftjoin('persona AS pe', 'pe.id', "=", 'ma.id_persona')
            ->leftjoin('sede AS sed', 'sed.id', "=", 'ma.id_sede')
            ->select('ma.*', 'se.codigo as nombresemestre', 'pe.nombre as nombrepersona', 'pe.url_imagen', 'sed.nombre as nombresede','pe.celular','pe.correo','pe.observaciones as detallepersona','pe.numero_documento', 'pe.apellido','mg.id as idmg')
            ->where('mg.id_estado', '=', '1')
            ->where('mg.id_grupo', '=', $Grupo->id)
            ->orderBy('ma.id', 'desc')->get();
            $ArrayColores = ['1'=>'success','2'=>'info','3'=>'warning','4'=> 'danger'];
            $Materia = \DB::table("materia as ma")
            ->join('materia_grupo as mg', 'mg.id_materia', "=", 'ma.id')
            ->select('ma.*','mg.id as idmg')
            ->where('mg.id_grupo', '=', $Grupo->id)
            ->where('mg.estado', '=', '1')
            ->orderBy('ma.id', 'desc')
            ->groupBy('ma.id')->get(); 
        return view('grupo.infogroup', ['Grupo' => $Grupo, 'Matricula' => $Matricula, 'Sede' => $Sede, 'Semestre' => $Semestre, 'Persona' => $Persona, 'Estado' => $Estado,'ArrayColores'=>$ArrayColores,'Materia'=>$Materia]);
    }

    /**
     * Redirige a la vista para agregar materias al grupo
     */
    public function addmatter($id)
    {
        $Grupo = Grupo::findOrfail($id);
        $MateriasAgregadas = \DB::table("materia_grupo")->where('id_grupo', '=', $id)->where('estado', '=', '1')->pluck('id_materia');
        $Materia = \DB::table("materia")
            ->where('estado', '=', '1')
            ->whereNotIn('id', $MateriasAgregadas )->get();
        return view('grupo.addmatter', ['Grupo' => $Grupo, 'Materia' => $Materia]);
    }

    /**
     * registra las materias seleccionadas al grupo
     */

    public function assignmatter(Request $request)
    {
        try {
            DB::beginTransaction();
            $arraymaterias = $request->get('arraymaterias');
            $contador = 0;
            while ($contador < count($arraymaterias)) {
                $MateriaGrupo = new MateriaGrupo();
                $now = new \DateTime();
                $MateriaGrupo->id_grupo = $request->get('idgrupo');
                $MateriaGrupo->id_materia = $arraymaterias[$contador];
                $MateriaGrupo->fecha_asignacion = $now;
                $MateriaGrupo->estado = 1;
                $MateriaGrupo->id_usuario_registra = auth()->user()->id;
                $MateriaGrupo->save();
                $contador++;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return Redirect::to('info/' . $request->get('idgrupo') . '/group');

    }

    
    /**
     * Imprime la informacion grupo para agregar horario
     */
    public function classschedule($id)
    {
        $Grupo = Grupo::findOrfail($id);
        $Sede = \DB::table("sede as se")
        ->leftjoin('barrio as ba', 'ba.id', "=", 'se.id_barrio')
        ->select('se.*', 'ba.nombre as nombrebarrio')
        ->where('se.id', '=', $Grupo->id_sede)->get();
        $Semestre = \DB::table("semestre")->where('id', '=', $Grupo->id_semestre)->get();
        $Persona = \DB::table("persona")->where('id', '=', $Grupo->id_persona_responsable)->get();
        $Estado = \DB::table("estado")->where('id', '=', $Grupo->id_estado)->get();
        return view('grupo.classschedule', ['Grupo' => $Grupo,  'Sede' => $Sede, 'Semestre' => $Semestre, 'Persona' => $Persona, 'Estado' => $Estado]);
    }



}
