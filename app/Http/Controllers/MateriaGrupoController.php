<?php

namespace Piccolino\Http\Controllers;

use Illuminate\Http\Request;

use Piccolino\Http\Requests;
use Piccolino\MateriaGrupo;
use Illuminate\support\Facades\Redirect;
class MateriaGrupoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Cambia Desactiva la materia al grupo
     */
    public function destroy($id)
    {
        $MateriaGrupo = MateriaGrupo::findOrfail($id);
        $MateriaGrupo->estado = 2;
        $MateriaGrupo->update();
        return Redirect::to('info/' . $MateriaGrupo->id_grupo . '/group');
    }

   
}
