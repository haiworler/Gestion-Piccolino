<?php

namespace Piccolino\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Piccolino\http\Requests\MateriaFormRequest;
use Piccolino\MaestroMateria;
use Piccolino\Materia;

class MateriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Enlista la materias
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $Materia = \DB::table("materia")
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('materia.index', ['Materia' => $Materia, 'searchText' => $query]);
        }

    }

    /**
     * Redirige el formulario para la creacion de la Materia
     */
    public function create()
    {
        $persona = \DB::table("persona")
            ->where('id_tipo_persona', '=', '2')
            ->orderBy('id', 'desc')->get();
        return view('materia.create', ['Persona' => $persona]);
    }
    /**
     * Registra la Materi
     */
    public function store(MateriaFormRequest $request)
    {
        try {
            $now = new \DateTime();
            $Materia = new Materia();
            $Materia->nombre = $request->get('nombre');
            $Materia->codigo = $request->get('codigo');
            $Materia->observaciones = $request->get('observaciones');
            $Materia->creditos = $request->get('credito');
            $Materia->fecha_registro = $now;
            $Materia->id_usuario_registra = auth()->user()->id;
            $Materia->estado = 1;
            $Materia->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('materia');
    }
    /**
     * Muestra los datos de la Materia segun el ID
     */

    public function show($id)
    {
        $Materia = Materia::findOrdFail($id);
        return view('materia.show', ['Materia' => $Materia]);
    }
    /**
     * Redirige al formulario edit para la edición de la Materia
     */
    public function edit($id)
    {
        $Arrayestado = ['1', '2'];
        $Materia = Materia::findOrfail($id);
        return view('materia.edit', ['Materia' => $Materia, 'Arrayestado' => $Arrayestado]);
    }
    /**
     * Actualiza la Materia
     */
    public function update(MateriaFormRequest $request, $id)
    {
        try {
            $Materia = Materia::findOrfail($id);
            $Materia->nombre = $request->get('nombre');
            $Materia->codigo = $request->get('codigo');
            $Materia->observaciones = $request->get('observaciones');
            $Materia->creditos = $request->get('credito');
            $Materia->estado = $request->get('estado');
            $Materia->update();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('materia');
    }
    /**
     * Cambia el estado  la Materia
     */
    public function destroy($id)
    {
        $Materia = Materia::findOrfail($id);
        $Materia->estado = 2;
        $Materia->update();
        return Redirect::to('materia');
    }

    /**
     *  Envia a la vista de asignacion de maestros
     */

    public function assignteachers($id)
    {
        $Materia = Materia::findOrfail($id);

        $MaestrosAgregadas = \DB::table("maestro_materia")->where('id_materia', '=', $id)->where('estado', '=', '1')->pluck('id_persona');
        $Persona = \DB::table("persona")
            ->where('estado', '=', '1')
            ->where('id_tipo_persona', '<>', '1')
            ->whereNotIn('id', $MaestrosAgregadas )->get();
        return view('materia.assignteachers', ['Materia' => $Materia, 'Persona' => $Persona]);
    }

    /**
     * registra las materias seleccionadas al grupo
     */

    public function addteachers(Request $request)
    {
        try {
            DB::beginTransaction();
            $arraymaestros = $request->get('arraymaestros');
            $contador = 0;
            while ($contador < count($arraymaestros)) {
                $MaestroMateria = new MaestroMateria();
                $now = new \DateTime();
                $MaestroMateria->id_materia = $request->get('idmateria');
                $MaestroMateria->id_persona = $arraymaestros[$contador];
                $MaestroMateria->fecha_registro = $now;
                $MaestroMateria->estado = 1;
                $MaestroMateria->id_usuario_registra = auth()->user()->id;
                $MaestroMateria->save();
                $contador++;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return Redirect::to('materia');

    }

    /**
     * Imprime la informacion de la materia
     */
    public function info($id)
    {
        $Materia = Materia::findOrfail($id);
        $MaestrosMateria = \DB::table("maestro_materia as maestro")
            ->join('persona as per', 'per.id', "=", 'maestro.id_persona')
            ->select('per.*','maestro.id as idmp')
            ->where('maestro.estado', '=', '1')
            ->where('maestro.id_materia', '=', $Materia->id)->get();
        return view('materia.info', ['Materia' => $Materia, 'MaestrosMateria' => $MaestrosMateria]);
    }

}
