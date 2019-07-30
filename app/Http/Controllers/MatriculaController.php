<?php

namespace Piccolino\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Piccolino\http\Requests\ConsultStudentFormRequest;
use Piccolino\http\Requests\MatriculaFormRequest;
use Piccolino\Matricula;
use Piccolino\Persona;

class MatriculaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // En Lista las matriculas
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $Matricula = \DB::table("matricula as mat")
                ->leftjoin('persona as per', 'mat.id_persona', "=", 'per.id')
                ->leftjoin('sede as sed', 'mat.id_sede', "=", 'sed.id')
                ->leftjoin('semestre as sem', 'mat.id_semestre', "=", 'sem.id')
                ->leftjoin('grado AS gra', 'mat.id_grado', "=", 'gra.id')
                ->select('mat.*', 'per.nombre AS nombrepersona', 'sed.nombre as nombresede', 'sem.codigo as codigosemestre', 'gra.nombre as nombregado')
                ->where('mat.codigo', 'LIKE', '%' . $query . '%')
                ->orderBy('mat.id', 'desc')
                ->paginate(7);
            //dd($Matricula);
            return view('matricula.index', ['Matricula' => $Matricula, 'searchText' => $query]);
        }

    }

    /**
     * No se esta Utilizando
     */
    public function create()
    {
        return view('/matricula');
    }
    /**
     * Registra la Matricula
     */
    public function store(MatriculaFormRequest $request)
    {
        try {
            $now = date('Y-m-d');
            $Matricula = new Matricula();
            $CostoMatricula = \DB::table("costo_matricula")
                ->where('fecha_inicio_periodo', '<=', $now)
                ->where('fecha_fin_periodo', '>=', $now)->take(1)
                ->get();
            if ($CostoMatricula) {
                $valor = $CostoMatricula[0]->valor;
            } else {
                $valor = 5000;
            }
            $Matricula->id_persona = $request->get('idpersona');
            $Matricula->costo = (int) $valor;
            $Matricula->codigo = $request->get('codigo');
            $Matricula->id_sede = $request->get('sede');
            $Matricula->id_semestre = $request->get('semestre');
            $Matricula->id_grado = $request->get('grado');
            $Matricula->observaciones = $request->get('observaciones');
            $Matricula->estado = 1;
            $Matricula->fecha_registro = $now;
            $Matricula->is_usuario_registra = auth()->user()->id;
            $Matricula->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('matricula');
    }

    public function show($id)
    {
        $persona = Persona::findOrdFail($id);
        return view('persona.show', ['id' => $persona]);
    }
    /**
     * Redirige el formulario para la edicion de las matriculas
     */
    public function edit($id)
    {
        $Arrayestado = ['1', '2'];
        $Matricula = Matricula::findOrfail($id);
        $Persona = Persona::findOrfail($Matricula->id_persona);
        $Semestre = \DB::table("semestre")->where('estado', '=', '1')->get();
        $Sede = \DB::table("sede")->where('estado', '=', '1')->get();
        $Grado = \DB::table("grado")->where('estado', '=', '1')->get();
        //dd($Matricula);
        return view('matricula.edit', ['Matricula'=>$Matricula,'Persona' => $Persona, 'Semestre' => $Semestre, 'Sede' => $Sede, 'Grado' => $Grado,'Arrayestado' => $Arrayestado]);
    }
    /**
     * Actatualiza la matricula
     */
    public function update(MatriculaFormRequest $request, $id)
    {
        try {
            $Matricula = Matricula::findOrfail($id);
            if ($request->get('costo')) {
                $valor = $request->get('costo');
            } else {
                $valor = 5000;
            }
            $Matricula->id_persona = $request->get('idpersona');
            $Matricula->costo = (int) $valor;
            $Matricula->codigo = $request->get('codigo');
            $Matricula->id_sede = $request->get('sede');
            $Matricula->id_semestre = $request->get('semestre');
            $Matricula->id_grado = $request->get('grado');
            $Matricula->observaciones = $request->get('observaciones');
            $Matricula->estado = $request->get('estado');
            $Matricula->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('matricula');
    }
    // Cambiar el estado del Semestre a Inactivo
    public function destroy($id)
    {
        $Matricula = Matricula::findOrfail($id);
        $Matricula->estado = 2;
        $Matricula->update();
        return Redirect::to('/matricula');
    }
    /**
     * Redirige al formulario para el filtro de los estudiantes
     */
    public function FilterStudy()
    {
        return view('matricula.filterstudy');
    }

    /**
     * Cconsulta al estudiante segun su ID
     */
    public function ConsultStudent(ConsultStudentFormRequest $request)
    {
        try {
            $Persona = \DB::table("persona as person")->
                leftjoin('tipo_persona AS tperson', 'person.id_tipo_persona', "=", 'tperson.id')
                ->leftjoin('tipo_documento AS tdo', 'person.id_tipo_documento', "=", 'tdo.id')
                ->leftjoin('ciudad AS ciudadn', 'person.id_ciudad_de_nacimiento', "=", 'ciudadn.id')
                ->leftjoin('genero AS ge', 'person.id_genero', "=", 'ge.id')
                ->leftjoin('barrio AS ba', 'person.id_barrio', "=", 'ba.id')
                ->leftjoin('sede AS sd', 'person.id_sede', "=", 'sd.id')
                ->leftjoin('ocupacion AS ocu', 'person.id_ocupacion', "=", 'ocu.id')
                ->select('person.*', 'tperson.nombre as nombretipoperson', 'tdo.nombre as nombretipodocumento', 'ciudadn.nombre as nombreciudadn', 'ge.nombre as nombregenero', 'ba.nombre as nombrebarrio', 'sd.nombre as nombresede', 'ocu.nombre as nombreocupacion')
                ->where('person.id', '=', $request->get('codigoestudiante'))->get();
        } catch (\Exception $e) {
            return view('matricula.consultstudent', ['Persona' => null]);
        }
        if ($Persona) {
            return view('matricula.consultstudent', ['Persona' => $Persona[0]]);
        } else {
            return view('matricula.consultstudent', ['Persona' => null]);

        }
    }
    /**
     * Permite Registrar la Matricula
     */

    public function RegisterEnrollment($id)
    {
        $Persona = Persona::findOrfail($id);
        $Semestre = \DB::table("semestre")->where('estado', '=', '1')->get();
        $Sede = \DB::table("sede")->where('estado', '=', '1')->get();
        $Grado = \DB::table("grado")->where('estado', '=', '1')->get();
        return view('matricula.registerenrollment', ['Persona' => $Persona, 'Semestre' => $Semestre, 'Sede' => $Sede, 'Grado' => $Grado]);
    }

}
