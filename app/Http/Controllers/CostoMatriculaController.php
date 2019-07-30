<?php

namespace Piccolino\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Piccolino\CostoMatricula;
use Piccolino\http\Requests\CostoMatriculaFormRequest;

class CostoMatriculaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Enlista los Costos de las Matriculas
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $CostoMatricula = \DB::table("costo_matricula")
                ->where('valor', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('costomatricula.index', ['CostoMatricula' => $CostoMatricula, 'searchText' => $query]);
        }

    }

    /**
     * Redirige el formulario para la creacion de costo de la matricula
     */
    public function create()
    {
        return view('costomatricula.create');
    }
    /**
     * Registra el Costo de la matricula
     */
    public function store(CostoMatriculaFormRequest $request)
    {
        try {
            $now = new \DateTime();
            $CostoMatricula = new CostoMatricula();
            $CostoMatricula->valor = $request->get('valor');
            $CostoMatricula->fecha_inicio_periodo = $request->get('fechainicio');
            $CostoMatricula->fecha_fin_periodo = $request->get('fechafin');
            $CostoMatricula->observaciones = $request->get('observaciones');
            $CostoMatricula->fecha_registro = $now;
            $CostoMatricula->id_usuario_registro = auth()->user()->id;
            $CostoMatricula->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('/costomatricula');
    }
    /**
     * Muestra los datos del Del Costo de la Matricula segun el ID
     */

    public function show($id)
    {
        $CostoMatricula = CostoMatricula::findOrdFail($id);
        return view('costomatricula.show', ['CostoMatricula' => $CostoMatricula]);
    }
    /**
     * Redirige al formulario edit para la edición del Costo de la Matricula
     */
    public function edit($id)
    {
        $CostoMatricula = CostoMatricula::findOrfail($id);
        return view('costomatricula.edit', ['CostoMatricula' => $CostoMatricula]);
    }
    /**
     * Actualiza el Grado
     */
    public function update(CostoMatriculaFormRequest $request, $id)
    {
        try {
            $CostoMatricula = CostoMatricula::findOrfail($id);
            $CostoMatricula->valor = $request->get('valor');
            $CostoMatricula->fecha_inicio_periodo = $request->get('fechainicio');
            $CostoMatricula->fecha_fin_periodo = $request->get('fechafin');
            $CostoMatricula->observaciones = $request->get('observaciones');
            $CostoMatricula->update();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('/costomatricula');
    }
    /**
     * Cambia el estado al Grado
     */
    public function destroy($id)
    {
        $CostoMatricula = CostoMatricula::findOrfail($id);
        $CostoMatricula->update();
        return Redirect::to('/costomatricula');
    }
}
