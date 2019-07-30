<?php

namespace Piccolino\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Illuminate\support\Facades\Redirect;
use Piccolino\MatriculaGrupo;

class MatriculaGrupoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Cambia el estado la matricula del grupo
     */
    public function destroy($id)
    {
        $MatriculaGrupo = MatriculaGrupo::findOrfail($id);
        $idGrupo = $MatriculaGrupo->id_grupo;
        MatriculaGrupo::destroy($id);
        return Redirect::to('info/' . $idGrupo . '/group');
    }

}
