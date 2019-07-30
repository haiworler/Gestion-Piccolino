<?php

namespace Piccolino\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Piccolino\Grado;
use Piccolino\http\Requests\GradoFormRequest;

class GradoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Enlista los Grados
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $Grado = \DB::table("grado")
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('grado.index', ['Grado' => $Grado, 'searchText' => $query]);
        }

    }

    /**
     * Redirige el formulario para la creacion del Grado
     */
    public function create()
    {
        return view('grado.create');
    }
    /**
     * Registra el Grado
     */
    public function store(GradoFormRequest $request)
    {
        try {
            $Grado = new Grado();
            $Grado->nombre = $request->get('nombre');
            $Grado->codigo = $request->get('codigo');
            $Grado->estado = 1;
            $Grado->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('/grado');
    }
    /**
     * Muestra los datos del Grado segun el ID
     */

    public function show($id)
    {
        $Grado = Grado::findOrdFail($id);
        return view('grado.show', ['Grado' => $Grado]);
    }
    /**
     * Redirige al formulario edit para la edición del Grado
     */
    public function edit($id)
    {
        $Arrayestado = ['1', '2'];
        $Grado = Grado::findOrfail($id);
        return view('grado.edit', ['Grado' => $Grado, 'Arrayestado' => $Arrayestado]);
    }
    /**
     * Actualiza el Grado
     */
    public function update(GradoFormRequest $request, $id)
    {
        try {
            $Grado = Grado::findOrfail($id);
            $Grado->nombre = $request->get('nombre');
            $Grado->codigo = $request->get('codigo');
            $Grado->estado = $request->get('estado');
            $Grado->update();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('/grado');
    }
    /**
     * Cambia el estado al Grado
     */
    public function destroy($id)
    {
        $Grado = Grado::findOrfail($id);
        $Grado->estado = 2;
        $Grado->update();
        return Redirect::to('/grado');
    }
}
