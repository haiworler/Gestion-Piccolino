<?php

namespace Piccolino\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\support\Facades\Redirect;
use Piccolino\http\Requests\UserFormRequest;
use Piccolino\Persona;
use Piccolino\User;

class UserController extends Controller
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

    /** Petodo para regostrar la persona, Envia a la vista los datos requeridos */
    public function create($idPersona)
    {
        $persona = Persona::findOrfail($idPersona);
        //$TipoDocumento = \DB::table("tipo_documento")->where('estado', '=', '1')->get();
        //$CiudadNacimiento = \DB::table("ciudad")->where('estado', '=', '1')->get();
        //$Genero = \DB::table("genero")->where('estado', '=', '1')->get();
        //$Localidad = \DB::table("localidad")->get();
        //$Ocupacion = \DB::table("ocupacion")->get();
        //$Sede = \DB::table("sede")->where('estado', '=', '1')->get();
        //$TipoPersona = \DB::table("tipo_persona")->where('estado', '=', '1')->get();
        return view('user.create', ['Persona' => $persona]);
    }
    // Registra la Usuario
    public function store(UserFormRequest $request)
    {
        try {
            DB::beginTransaction();
            $User = new User();
            $User->name = $request->get('nombre');
            $User->email = $request->get('email2');
            $User->password = bcrypt($request->get('password2'));
            $User->id_persona = $request->get('idpersona');
            $User->id_rol = $request->get('rol');
            $User->estado = 1;
            $User->save();
            if (Input::hasFile('imagen')) {
                $file = Input::file('imagen');
                $file->move(public_path() . '/imagenes/Users/', $User->id . '.' . $file->getClientOriginalExtension());
                $User->urlimagen = $User->id . '.' . $file->getClientOriginalExtension();
                $User->update();
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return Redirect::to('/detailperson/' . $request->get('idpersona'));
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
        $User = User::findOrfail($id);
        $Roles = \DB::table("roles")->where('estado', '=', '1')->get();
        return view('user.edit', ['User' => $User, 'Roles' => $Roles,'Arrayestado'=>$Arrayestado]);
    }
    // Actializa El usuario
    public function update(UserFormRequest $request, $id)
    {
        try {
            $User = User::findOrfail($id);
            $User->name = $request->get('nombre');
            $User->email = $request->get('email2');
            if ($User->password != $request->get('password2')) {
                $User->password = bcrypt($request->get('password2'));
            }
            $User->id_rol = $request->get('rol');
            $User->estado = $request->get('estado');
            if (Input::hasFile('imagen')) {
                $file = Input::file('imagen');
                $file->move(public_path() . '/imagenes/Users/', $User->id . '.' . $file->getClientOriginalExtension());
                $User->urlimagen = $User->id . '.' . $file->getClientOriginalExtension();
            }
            $User->update();
        } catch (\Exception $e) {
            DB::rollback();
            return $e->getMessage();
        }
        return Redirect::to('/detailperson/' . $request->get('idpersona'));
    }
    // Cambiar el estado de una persona
    public function destroy($id)
    {
        $Persona = Persona::findOrfail($id);
        $Persona->estado = 2;
        $Persona->update();
        return Redirect::to('persona');
    }
    // Redirige a la vista de asignacion de usuarios
    public function AssignUser($idPersona)
    {
        $persona = Persona::findOrfail($idPersona);
        $Roles = \DB::table("roles")->where('estado', '=', '1')->get();
        return view('user.assign', ['Persona' => $persona, 'Roles' => $Roles]);
    }

}
