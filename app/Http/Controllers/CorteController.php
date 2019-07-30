<?php

namespace Piccolino\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Piccolino\Corte;
use Piccolino\http\Requests\CorteFormRequest;


class CorteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Enlista los cortes
     */
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $Corte = \DB::table("corte")
                ->where('nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('corte.index', ['Corte' => $Corte, 'searchText' => $query]);
        }

    }

    /**
     * Redirige el formulario para la creacion del corte
     */
    public function create()
    {
        return view('corte.create');
    }
    /**
     * Registra el Corte
     */
    public function store(CorteFormRequest $request)
    {
        try {
            $Corte = new Corte();
            $Corte->nombre = $request->get('nombre');
            $Corte->estado = 1;
            $Corte->save();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('/corte');
    }
    /**
     * Muestra los datos del corte segun el in
     */

    public function show($id)
    {
        $Corte = Corte::findOrdFail($id);
        return view('Corte.show', ['Corte' => $Corte]);
    }
    /**
     * Redirige al formulario edit para la edición del corte
     */
    public function edit($id)
    {
        $Arrayestado = ['1', '2'];
        $Corte = Corte::findOrfail($id);
        return view('corte.edit', ['Corte' => $Corte, 'Arrayestado' => $Arrayestado]);
    }
    /**
     * Actualiza el corte
     */
    public function update(CorteFormRequest $request, $id)
    {
        try {
            $Corte = Corte::findOrfail($id);
            $Corte->nombre = $request->get('nombre');
            $Corte->estado = $request->get('estado');

            $Corte->update();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return Redirect::to('/corte');
    }
    /**
     * Cambia el estado al corte
     */
    public function destroy($id)
    {
        $Corte = Corte::findOrfail($id);
        $Corte->estado = 2;
        $Corte->update();
        return Redirect::to('/corte');
    }
}
