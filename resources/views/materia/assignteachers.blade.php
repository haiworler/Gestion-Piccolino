@extends('admin.admin')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Asignar Maestros a la materia {{$Materia->nombre}}</h3>
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
                <!-- form date pickers -->
                <div class="x_panel" style="">
                    <div class="x_title">
                        <h2>Favor sea muy cuidadoso al momento de asignar los Profesores a las materias</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                    aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Settings 1</a>
                                    </li>
                                    <li><a href="#">Settings 2</a>
                                    </li>
                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    {!!Form::open(array('url'=>'addteachers','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback mi-input">
                            <input type="text" class="form-control has-feedback-left" id="nombremateria" name="nombremateria"
                                placeholder="Nombre Materia" required value="{{$Materia->nombre}}" disabled
                                style="text-align:center">
                            <span class="fa fa-barcode form-control-feedback left " aria-hidden="true"></span>
                            <input type="hidden" name="idmateria" value="{{$Materia->id}}">
                        </div>
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 style="text-align:center">Maestros disponibles</h2>
                                    <ul class="nav navbar-right panel_toolbox">
                                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                        </li>
                                    </ul>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <table id="datatable-checkbox"
                                        class="table table-striped table-bordered bulk_action">
                                        <thead>
                                            <tr>
                                                <th>Fotografia</th>
                                                <th>Nombre</th>
                                                <th>Estado</th>
                                                <th>Correo</th>
                                                <th><i class="fa fa-check-square-o"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Persona as $items)
                                            <tr>
                                                <td><img src="{{asset('imagenes/persona/'.$items->url_imagen)}}" alt="Foto" style=" width: 60px;  height: 50px; " class="img-thumbnail"> </td>
                                                <td>{{$items->nombre}} {{$items->apellido}}</td>
                                                <td>@if($items->estado == 1) Activo @else Inactivo @endif</td>
                                                <td>{{$items->correo}}</td>
                                                <td>
                                                    <input name="arraymaestros[]" value="{{$items->id}}" type="checkbox" id="check-all" class="flat">
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!---->
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3" style="text-align:center;">
                            <button id="send" type="submit" class="btn btn-success">Agregar</button>
                        </div>
                    </div>
                </div>
                {!!Form::close()!!}
                <!-- /form datepicker -->
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection