<?php

namespace Piccolino\Http\Controllers;
use Illuminate\Http\Request;
use Piccolino\Http\Requests;
use DB;
use Illuminate\support\Facades\Redirect;
class ConsultaController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
    }
    /**Consulta los barrios segun la localidad */
		public function getListBarrio($id){
			try{	
					$Barrios = \DB::table("barrio")->where('id_localidad','=',$id)->get();
					return $Barrios;
			} catch (\Exception $e) {
				return $e->getMessage();
			}
		}
}
