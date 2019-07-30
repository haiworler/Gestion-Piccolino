<?php

namespace Piccolino\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Piccolino\MaestroMateria;
use Piccolino\Materia;

class MaestroMateriaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Funcion que desactiva el maestro asignado a la materia
     */

    public function destroy($id)
    {
        try {
            $MaestroMateria = MaestroMateria::findOrfail($id);
            $MaestroMateria->estado = 2;
            $MaestroMateria->update();
            $Materia = Materia::findOrfail($MaestroMateria->id_materia);
            $MaestrosMateria = \DB::table("maestro_materia as maestro")
                ->join('persona as per', 'per.id', "=", 'maestro.id_persona')
                ->select('per.*','maestro.id as idmp')
                ->where('maestro.estado', '=', '1')
                ->where('maestro.id_materia', '=', $Materia->id)->get();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return view('materia.info', ['Materia' => $Materia, 'MaestrosMateria' => $MaestrosMateria]);
    }

}
