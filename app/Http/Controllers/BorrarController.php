<?php

namespace Piccolino\Http\Controllers;

use Piccolino\ContactoPersona;
use Piccolino\CorteSemestre;
use Piccolino\DocumentoPersona;

class BorrarController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**Borrar Contactos */
    public function getBorrarContacto($id)
    {
        try {
            ContactoPersona::destroy($id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    // Borrar Documento
    public function getBorrarDocumento($id)
    {
        try {
            DocumentoPersona::destroy($id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
    // Borrar CorteSemestre
    public function getBorrarCorteSemestre($id)
    {
        try {
            CorteSemestre::destroy($id);
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
