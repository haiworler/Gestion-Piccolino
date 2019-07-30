<?php

namespace Piccolino\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\support\Facades\Redirect;
use Piccolino\ContactoPersona;
use Piccolino\DocumentoPersona;
use Piccolino\http\Requests\PersonaFormRequest;
use Piccolino\Persona;
use Piccolino\User;

class PersonaController extends Controller
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
            $persona = \DB::table("persona as person")
                ->leftjoin('tipo_persona AS tperson', 'person.id_tipo_persona', "=", 'tperson.id')
                ->leftjoin('tipo_documento AS tdo', 'person.id_tipo_documento', "=", 'tdo.id')
                ->leftjoin('ciudad AS ciudadn', 'person.id_ciudad_de_nacimiento', "=", 'ciudadn.id')
                ->leftjoin('genero AS ge', 'person.id_genero', "=", 'ge.id')
                ->leftjoin('barrio AS ba', 'person.id_barrio', "=", 'ba.id')
                ->leftjoin('sede AS sd', 'person.id_sede', "=", 'sd.id')
                ->leftjoin('ocupacion AS ocu', 'person.id_ocupacion', "=", 'ocu.id')
                ->select('person.*', 'tperson.nombre as nombretipoperson', 'tdo.nombre as nombretipodocumento', 'ciudadn.nombre as nombreciudadn', 'ge.nombre as nombregenero', 'ba.nombre as nombrebarrio', 'sd.nombre as nombresede', 'ocu.nombre as nombreocupacion')
                ->where('person.id_tipo_persona', '=', '1')
                ->where('person.nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('person.id', 'desc')
                ->paginate(7);
            return view('persona.index', ['persona' => $persona, 'searchText' => $query]);
        }

    }
    // Listado de Voluntarios
    public function ListVoluntary(Request $request)
    {
        if ($request) {
            $query = trim($request->get('searchText'));
            $persona = \DB::table("persona as person")
                ->leftjoin('tipo_persona AS tperson', 'person.id_tipo_persona', "=", 'tperson.id')
                ->leftjoin('tipo_documento AS tdo', 'person.id_tipo_documento', "=", 'tdo.id')
                ->leftjoin('ciudad AS ciudadn', 'person.id_ciudad_de_nacimiento', "=", 'ciudadn.id')
                ->leftjoin('genero AS ge', 'person.id_genero', "=", 'ge.id')
                ->leftjoin('barrio AS ba', 'person.id_barrio', "=", 'ba.id')
                ->leftjoin('sede AS sd', 'person.id_sede', "=", 'sd.id')
                ->leftjoin('ocupacion AS ocu', 'person.id_ocupacion', "=", 'ocu.id')
                ->select('person.*', 'tperson.nombre as nombretipoperson', 'tdo.nombre as nombretipodocumento', 'ciudadn.nombre as nombreciudadn', 'ge.nombre as nombregenero', 'ba.nombre as nombrebarrio', 'sd.nombre as nombresede', 'ocu.nombre as nombreocupacion')
                ->where('person.id_tipo_persona', '=', '2')
                ->where('person.nombre', 'LIKE', '%' . $query . '%')
                ->orderBy('person.id', 'desc')
                ->paginate(7);
            return view('persona.listvoluntary', ['persona' => $persona, 'searchText' => $query]);
        }
    }

    /** Petodo para regostrar la persona, Envia a la vista los datos requeridos */
    public function create()
    {
        $persona = Persona::findOrfail(auth()->user()->id_persona);
        $TipoDocumento = \DB::table("tipo_documento")->where('estado', '=', '1')->get();
        $CiudadNacimiento = \DB::table("ciudad")->where('estado', '=', '1')->get();
        $Genero = \DB::table("genero")->where('estado', '=', '1')->get();
        $Localidad = \DB::table("localidad")->get();
        $Ocupacion = \DB::table("ocupacion")->get();
        $Sede = \DB::table("sede")->where('estado', '=', '1')->get();
        $TipoPersona = \DB::table("tipo_persona")->where('estado', '=', '1')->get();
        return view('persona.create', ['Persona' => $persona, 'User' => auth()->user(), 'TipoDocumento' => $TipoDocumento, 'CiudadNacimiento' => $CiudadNacimiento, 'Genero' => $Genero, 'Localidad' => $Localidad, 'Ocupacion' => $Ocupacion, 'Sede' => $Sede, 'TipoPersona' => $TipoPersona]);
    }
    // Registra la persona
    public function store(PersonaFormRequest $request)
    {
        try {
            $now = new \DateTime();
            DB::beginTransaction();
            $Persona = new persona;
            $Persona->id_tipo_persona = $request->get('tipopersona');
            $Persona->nombre = $request->get('nombres');
            $Persona->apellido = $request->get('apellidos');
            $Persona->id_tipo_documento = $request->get('tipodocumento');
            $Persona->numero_documento = $request->get('numerodocumento');
            $Persona->fecha_nacimiento = $request->get('fechanacimiento');
            $Persona->id_ciudad_de_nacimiento = $request->get('ciudadnacimiento');
            $Persona->id_genero = $request->get('genero');
            $Persona->telefono = $request->get('telefono');
            $Persona->celular = $request->get('celular');
            $Persona->correo = $request->get('correo');
            $Persona->direccion_residencia = $request->get('direccionresidencia');
            $Persona->id_barrio = $request->get('idbarrio');
            $Persona->id_sede = $request->get('idsede');
            $Persona->id_ocupacion = $request->get('idocupacion');
            $Persona->rh = $request->get('rh');
            $Persona->eps = $request->get('eps');
            $Persona->observaciones = $request->get('observacionpersona');
            $Persona->estrato = $request->get('estrado');
            $Persona->nivel_sisben = $request->get('nivelsisben');
            $Persona->estado = 1;
            $Persona->como_llego_a_piccolino = $request->get('comoconociopiccolino');
            $Persona->fecha_registro = $now;
            $Persona->id_usuario_registra = auth()->user()->id;
            $Persona->save();
            if (Input::hasFile('imagen')) {
                $file = Input::file('imagen');
                $file->move(public_path() . '/imagenes/persona/', $Persona->id . '.' . $file->getClientOriginalExtension());
                $Persona->url_imagen = $Persona->id . '.' . $file->getClientOriginalExtension();
                $Persona->update();

            }
            $listparentesco = $request->get('listparentesco');
            $listnombrecontacto = $request->get('listnombrecontacto');
            $listtelefonocontacto = $request->get('listtelefonocontacto');
            $listcorreocontacto = $request->get('listcorreocontacto');
            $listobservacioncontacto = $request->get('listobservacioncontacto');
            $conadorContacto = 0;
            while ($conadorContacto < count($listparentesco)) {
                $now = new \DateTime();
                $ContactoPersona = new ContactoPersona();
                $ContactoPersona->id_persona = $Persona->id;
                $ContactoPersona->nombre = $listnombrecontacto[$conadorContacto];
                $ContactoPersona->telefono = $listtelefonocontacto[$conadorContacto];
                $ContactoPersona->correo = $listcorreocontacto[$conadorContacto];
                $ContactoPersona->parentezco = $listparentesco[$conadorContacto];
                $ContactoPersona->observaciones = $listobservacioncontacto[$conadorContacto];
                $ContactoPersona->fecha_registro = $now;
                $ContactoPersona->id_usuario_registra = auth()->user()->id;
                $ContactoPersona->save();
                $conadorContacto = $conadorContacto + 1;
            }
            $iddocimento = $request->get('iddocimento');
            $listnombredo = $request->get('listnombredo');
            $listnombreentidaddo = $request->get('listnombreentidaddo');
            $listubicaciondo = $request->get('listubicaciondo');
            $listfechado = $request->get('listfechado');
            $listobservaciondo = $request->get('listobservaciondo');
            $conadorDocumento = 0;
            while ($conadorDocumento < count($iddocimento)) {
                $now = new \DateTime();
                $DocumentoPersona = new DocumentoPersona();
                $DocumentoPersona->nombre = $listnombredo[$conadorDocumento];
                $DocumentoPersona->id_tipo_documento = $iddocimento[$conadorDocumento];
                $DocumentoPersona->fecha_obtencion = $listfechado[$conadorDocumento];
                $DocumentoPersona->nombre_entidad = $listnombreentidaddo[$conadorDocumento];
                $DocumentoPersona->observaciones = $listobservaciondo[$conadorDocumento];
                $DocumentoPersona->id_sede = $Persona->id_sede;
                $DocumentoPersona->ubicacion = $listubicaciondo[$conadorDocumento];
                $DocumentoPersona->id_persona = $Persona->id;
                $DocumentoPersona->estado = 1;
                $DocumentoPersona->fecha_registro = $now;
                $DocumentoPersona->id_usuario_registra = auth()->user()->id;
                $DocumentoPersona->save();
                $conadorDocumento = $conadorDocumento + 1;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return Redirect::to('/persona');
    }

    public function show($id)
    {
        $persona = Persona::findOrdFail($id);
        return view('persona.show', ['id' => $persona]);
    }
    // Redirige a la vista de edicion
    public function edit($id)
    {
        $Arrayestrato = ['1', '2', '3', '4', '5', '6'];
        $Arrayestado = ['1', '2'];
        $Persona = Persona::findOrfail($id);
        $TipoDocumento = \DB::table("tipo_documento")->where('estado', '=', '1')->get();
        $CiudadNacimiento = \DB::table("ciudad")->where('estado', '=', '1')->get();
        $Genero = \DB::table("genero")->where('estado', '=', '1')->get();
        $Localidad = \DB::table("localidad")->get();
        $Barrios = \DB::table("barrio")->get();
        $Ocupacion = \DB::table("ocupacion")->get();
        $Barrio = \DB::table("barrio")->where('id', '=', $Persona->id_barrio)->get();
        $Sede = \DB::table("sede")->where('estado', '=', '1')->get();
        $TipoPersona = \DB::table("tipo_persona")->where('estado', '=', '1')->get();
        $Contactos = \DB::table("contacto_persona")->where('id_persona', '=', $id)->get();
        $Documentos = \DB::table("documento as doc")->
            leftjoin('tipo_documento AS tid', 'doc.id_tipo_documento', "=", 'tid.id')
            ->select('doc.*', 'tid.nombre as nombreti')
            ->where('id_persona', '=', $id)->get();
        return view('persona.edit',
            ['Persona' => $Persona,
                'TipoDocumento' => $TipoDocumento,
                'CiudadNacimiento' => $CiudadNacimiento,
                'Genero' => $Genero,
                'Localidad' => $Localidad,
                'Ocupacion' => $Ocupacion,
                'Sede' => $Sede,
                'TipoPersona' => $TipoPersona,
                'Contactos' => $Contactos,
                'Documentos' => $Documentos,
                'Barrio' => $Barrio,
                'Barrios' => $Barrios,
                'Arrayestrato' => $Arrayestrato,
                'Arrayestado' => $Arrayestado]);
    }

    public function update(PersonaFormRequest $request, $id)
    {
        try {
            $now = new \DateTime();
            DB::beginTransaction();
            $Persona = Persona::findOrfail($id);
            $Persona->id_tipo_persona = $request->get('tipopersona');
            $Persona->nombre = $request->get('nombres');
            $Persona->apellido = $request->get('apellidos');
            $Persona->id_tipo_documento = $request->get('tipodocumento');
            $Persona->numero_documento = $request->get('numerodocumento');
            $Persona->fecha_nacimiento = $request->get('fechanacimiento');
            $Persona->id_ciudad_de_nacimiento = $request->get('ciudadnacimiento');
            $Persona->id_genero = $request->get('genero');
            $Persona->telefono = $request->get('telefono');
            $Persona->celular = $request->get('celular');
            $Persona->correo = $request->get('correo');
            if (Input::hasFile('imagen')) {
                $file = Input::file('imagen');
                $file->move(public_path() . '/imagenes/persona/', $Persona->id . '.' . $file->getClientOriginalExtension());
                $Persona->url_imagen = $Persona->id . '.' . $file->getClientOriginalExtension();
            }
            $Persona->direccion_residencia = $request->get('direccionresidencia');
            $Persona->id_barrio = $request->get('idbarrio');
            $Persona->id_sede = $request->get('idsede');
            $Persona->id_ocupacion = $request->get('idocupacion');
            $Persona->rh = $request->get('rh');
            $Persona->eps = $request->get('eps');
            $Persona->observaciones = $request->get('observacionpersona');
            $Persona->estrato = $request->get('estrado');
            $Persona->nivel_sisben = $request->get('nivelsisben');
            $Persona->estado = $request->get('estado');
            $Persona->como_llego_a_piccolino = $request->get('comoconociopiccolino');
            $Persona->update();
            $idcontacto = $request->get('idcontacto');
            $listparentesco = $request->get('listparentesco');
            $listnombrecontacto = $request->get('listnombrecontacto');
            $listtelefonocontacto = $request->get('listtelefonocontacto');
            $listcorreocontacto = $request->get('listcorreocontacto');
            $listobservacioncontacto = $request->get('listobservacioncontacto');
            $conadorContacto = 0;
            while ($conadorContacto < count($listparentesco)) {
                $now = new \DateTime();
                if ($idcontacto[$conadorContacto] != null) {
                    $ContactoPersona = ContactoPersona::findOrfail($idcontacto[$conadorContacto]);
                } else {
                    $ContactoPersona = new ContactoPersona();
                }
                $ContactoPersona->id_persona = $Persona->id;
                $ContactoPersona->nombre = $listnombrecontacto[$conadorContacto];
                $ContactoPersona->telefono = $listtelefonocontacto[$conadorContacto];
                $ContactoPersona->correo = $listcorreocontacto[$conadorContacto];
                $ContactoPersona->parentezco = $listparentesco[$conadorContacto];
                $ContactoPersona->observaciones = $listobservacioncontacto[$conadorContacto];
                $ContactoPersona->fecha_registro = $now;
                $ContactoPersona->id_usuario_registra = auth()->user()->id;
                if ($idcontacto[$conadorContacto] != null) {
                    $ContactoPersona->update();
                } else {
                    $ContactoPersona->save();
                }
                $conadorContacto = $conadorContacto + 1;
            }
            $iddocumentopersona = $request->get('iddocumentopersona');
            $iddocimento = $request->get('iddocimento');
            $listnombredo = $request->get('listnombredo');
            $listnombreentidaddo = $request->get('listnombreentidaddo');
            $listubicaciondo = $request->get('listubicaciondo');
            $listfechado = $request->get('listfechado');
            $listobservaciondo = $request->get('listobservaciondo');
            $conadorDocumento = 0;
            while ($conadorDocumento < count($iddocimento)) {
                $now = new \DateTime();
                if ($iddocumentopersona[$conadorDocumento] != null) {
                    $DocumentoPersona = DocumentoPersona::findOrfail($iddocumentopersona[$conadorDocumento]);
                } else {
                    $DocumentoPersona = new DocumentoPersona();
                }
                $DocumentoPersona->nombre = $listnombredo[$conadorDocumento];
                $DocumentoPersona->id_tipo_documento = $iddocimento[$conadorDocumento];
                $DocumentoPersona->fecha_obtencion = $listfechado[$conadorDocumento];
                $DocumentoPersona->nombre_entidad = $listnombreentidaddo[$conadorDocumento];
                $DocumentoPersona->observaciones = $listobservaciondo[$conadorDocumento];
                $DocumentoPersona->id_sede = $Persona->id_sede;
                $DocumentoPersona->ubicacion = $listubicaciondo[$conadorDocumento];
                $DocumentoPersona->id_persona = $Persona->id;
                $DocumentoPersona->estado = 1;
                $DocumentoPersona->fecha_registro = $now;
                $DocumentoPersona->id_usuario_registra = auth()->user()->id;
                if ($iddocumentopersona[$conadorDocumento] != null) {
                    $DocumentoPersona->update();
                } else {
                    $DocumentoPersona->save();
                }
                $conadorDocumento = $conadorDocumento + 1;
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return Redirect::to('persona');
    }
    // Cambiar el estado de una persona
    public function destroy($id)
    {
        $Persona = Persona::findOrfail($id);
        $Persona->estado = 2;
        $Persona->update();
        return Redirect::to('persona');
    }
    // Muestra toda la informacion de la persona
    public function DetallePersona($id)
    {
        $Persona = \DB::table("persona as person")->
            leftjoin('tipo_persona AS tperson', 'person.id_tipo_persona', "=", 'tperson.id')
            ->leftjoin('tipo_documento AS tdo', 'person.id_tipo_documento', "=", 'tdo.id')
            ->leftjoin('ciudad AS ciudadn', 'person.id_ciudad_de_nacimiento', "=", 'ciudadn.id')
            ->leftjoin('genero AS ge', 'person.id_genero', "=", 'ge.id')
            ->leftjoin('barrio AS ba', 'person.id_barrio', "=", 'ba.id')
            ->leftjoin('sede AS sd', 'person.id_sede', "=", 'sd.id')
            ->leftjoin('ocupacion AS ocu', 'person.id_ocupacion', "=", 'ocu.id')
            ->select('person.*', 'tperson.nombre as nombretipoperson', 'tdo.nombre as nombretipodocumento', 'ciudadn.nombre as nombreciudadn', 'ge.nombre as nombregenero', 'ba.nombre as nombrebarrio', 'sd.nombre as nombresede', 'ocu.nombre as nombreocupacion')
            ->where('person.id', '=', $id)->get();
        $Contactos = \DB::table("contacto_persona")->where('id_persona', '=', $id)->get();
        $Documentos = \DB::table("documento as doc")->
            leftjoin('tipo_documento AS tid', 'doc.id_tipo_documento', "=", 'tid.id')->
            leftjoin('sede AS sd', 'doc.id_sede', "=", 'sd.id')
            ->select('doc.*', 'tid.nombre as nombreti', 'sd.nombre as nombresede')
            ->where('doc.id_persona', '=', $id)->get();
        $User = \DB::table("users AS user")
            ->leftjoin('roles AS rol', 'user.id_rol', "=", 'rol.id')
            ->select('user.*', 'rol.nombre as nombrerol')
            ->where('user.id_persona', '=', $id)->get();
        return view('persona.detalle', ['Persona' => $Persona,
            'Contactos' => $Contactos,
            'Documentos' => $Documentos,
            'User' => $User]);
    }

}
