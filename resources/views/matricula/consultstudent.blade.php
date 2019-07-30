@extends('admin.admin')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-12">
                {!!Form::open(array('url'=>'/ConsultStudent','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}
                <div class="">
                    <div class="x_content">
                        <div class="row">
                            @if($Persona != NULL)
                            <div class="animated flipInY col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-check-square-o"></i>
                                    </div>

                                    <div class="animated flipInY col-lg-11 col-md-11 col-sm-11 col-xs-12">
                                        <table class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th style="width: 1%">Código</th>
                                                    <th>Foto</th>
                                                    <th style="width: 20%">Nombre</th>
                                                    <th>{{$Persona->nombretipodocumento}}</th>
                                                    <th>Correo</th>
                                                    <th>Celular</th>
                                                    <th>Tipo</th>
                                                    <th>Genero</th>
                                                    <th>Sede</th>
                                                    <th>Estrato</th>
                                                    <th>Estado</th>
                                                    <th style="width: 20%">Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>{{$Persona->id}}</td>
                                                    <td>
                                                        <ul class="list-inline">
                                                            <li>
                                                                <img src="{{asset('imagenes/persona/'.$Persona->url_imagen)}}"
                                                                    class="avatar" alt="Avatar">
                                                            </li>
                                                        </ul>
                                                    </td>
                                                    <td>{{$Persona->nombre}} {{$Persona->apellido}}</td>
                                                    <td>{{$Persona->numero_documento}}</td>
                                                    <td>{{$Persona->correo}}</td>
                                                    <td>{{$Persona->celular}}</td>
                                                    <td>{{$Persona->nombretipoperson}}</td>
                                                    <td>{{$Persona->nombregenero}}</td>
                                                    <td>{{$Persona->nombresede}}</td>
                                                    <td>{{$Persona->estrato}}</td>
                                                    <td>@if($Persona->estado == 1) ACTIVO @else INACTIVO @endif</td>
                                                    <td>
                                                        <a href="registerenrollment/{{$Persona->id}}/registration" class="btn btn-primary btn-xs"><i
                                                                class="fa fa-arrow-right"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @else
                            <div class="animated flipInY col-lg-12 col-md-12 col-sm-6 col-xs-12">
                                <div class="tile-stats">
                                    <div class="icon"><i class="fa fa-times-circle"></i>
                                    </div>
                                    <div class="count">Validar</div>
                                    <h3>No se encontro el estudiante, o se encuentra Inactivo.</h3>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>
</div>
</div>
<!-- /page content -->
@endsection