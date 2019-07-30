<?php

namespace Piccolino\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Piccolino\CorteSemestre;
use Piccolino\http\Requests\SemestreFormRequest;
use Piccolino\Semestre;

class SemestreController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    // EN Lista a los estudiantes
    public function index(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $Semestre = \DB::table("semestre")
                ->where('codigo', 'LIKE', '%' . $query . '%')
                ->orderBy('id', 'desc')
                ->paginate(7);
            return view('semestre.index', ['Semestre' => $Semestre, 'searchText' => $query]);
        }

    }

    /** Redirige al formulario para la creacion del semestre */
    public function create()
    {
        $Corte = \DB::table("corte")->where('estado', '=', '1')->get();
        return view('semestre.create', ['Corte' => $Corte]);
    }
    // Registra El Semestre
    public function store(SemestreFormRequest $request)
    {
        try {
            $now = new \DateTime();
            DB::beginTransaction();
            $Semestre = new Semestre();
            $Semestre->fecha_inicio = $request->get('fechainicio');
            $Semestre->fecha_fin = $request->get('fechafin');
            $Semestre->observaciones = $request->get('observaciones');
            $Semestre->codigo = $request->get('codigo');
            $Semestre->estado = 1;
            $Semestre->fecha_registro = $now;
            $Semestre->id_usuario_registra = auth()->user()->id;
            $Semestre->save();
            $IdsCortes = $request->get('idcorte');
            $conadorCorte = 0;
            while ($conadorCorte < count($IdsCortes)) {
                $now = new \DateTime();
                $CorteSemestre = new CorteSemestre();
                $CorteSemestre->id_semestre = $Semestre->id;
                $CorteSemestre->id_corte = $IdsCortes[$conadorCorte];
                $CorteSemestre->fecha_registro = $now;
                $CorteSemestre->id_usuario_registra = auth()->user()->id;
                $CorteSemestre->save();
                $conadorCorte = $conadorCorte + 1;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return Redirect::to('/semestre');
    }

    public function show($id)
    {
        $persona = Persona::findOrdFail($id);
        return view('persona.show', ['id' => $persona]);
    }
    // Redirige a la vista de edicion
    public function edit($id)
    {
        $Arrayestado = ['1', '2'];
        $Corte = \DB::table("corte")->where('estado', '=', '1')->get();
        $Semestre = Semestre::findOrfail($id);
        $Cortes = \DB::table("corte as cor")->
            leftjoin('corte_semestre AS cs', 'cor.id', "=", 'cs.id_corte')
            ->select('cor.*', 'cs.id as idcs')
            ->where('cs.id_semestre', '=', $id)->get();
        return view('semestre.edit', ['Corte' => $Corte, 'Semestre' => $Semestre, 'Arrayestado' => $Arrayestado, 'Cortes' => $Cortes]);
    }
    // Actializa El Semestre
    public function update(SemestreFormRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $Semestre = Semestre::findOrfail($id);
            $Semestre->fecha_inicio = $request->get('fechainicio');
            $Semestre->fecha_fin = $request->get('fechafin');
            $Semestre->observaciones = $request->get('observaciones');
            $Semestre->codigo = $request->get('codigo');
            $Semestre->estado = $request->get('estado');
            $Semestre->save();
            $IdsCortes = $request->get('idcorte');
            $IdsCortesemestre = $request->get('idcortesemestre');
            $conadorCorte = 0;
            while ($conadorCorte < count($IdsCortesemestre)) {
                $now = new \DateTime();
                if ($IdsCortesemestre[$conadorCorte] != null) {
                    $CorteSemestre = CorteSemestre::findOrfail($IdsCortesemestre[$conadorCorte]);
                } else {
                    $CorteSemestre = new CorteSemestre();
                }
                $CorteSemestre->id_semestre = $Semestre->id;
                $CorteSemestre->id_corte = $IdsCortes[$conadorCorte];
                $CorteSemestre->fecha_registro = $now;
                $CorteSemestre->id_usuario_registra = auth()->user()->id;
                $CorteSemestre->save();
                $conadorCorte = $conadorCorte + 1;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return Redirect::to('/semestre');
    }
    // Cambiar el estado del Semestre a Inactivo
    public function destroy($id)
    {
        $Semestre = Semestre::findOrfail($id);
        $Semestre->estado = 2;
        $Semestre->update();
        return Redirect::to('semestre');
    }

}
