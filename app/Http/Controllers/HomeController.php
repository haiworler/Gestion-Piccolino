<?php

namespace Piccolino\Http\Controllers;

use Piccolino\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use Piccolino\Persona;
class HomeController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $persona = Persona::findOrfail(auth()->user()->id_persona);
        return view('home.index',['Persona'=>$persona,'User'=>auth()->user()]);
    }
}
