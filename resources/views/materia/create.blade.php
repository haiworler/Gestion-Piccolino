@extends('admin.admin')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Registro de Materia</h3>
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
                        <h2>Nueva Materia</h2>
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
                    {!!Form::open(array('url'=>'materia','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                            <input type="text" class="form-control has-feedback-left" id="nombre" name="nombre"
                                placeholder="Nombre Materia" required value="{{old('nombre')}}">
                            <span class="fa fa-wpforms form-control-feedback left " aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                            <input type="text" class="form-control has-feedback-left" id="codigo" name="codigo"
                                placeholder="Código Materia" required value="{{old('codigo')}}">
                            <span class="fa fa-barcode form-control-feedback left " aria-hidden="true"></span>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                            <input type="number" class="form-control has-feedback-left" id="credito" name="credito"
                                placeholder="Creditos Materia" required value="{{old('credito')}}">
                            <span class="fa fa-modx form-control-feedback left " aria-hidden="true"></span>
                        </div>
                        <div class="row calendar-exibit">
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class=" form-control" rows="1" name="observaciones" required="required"
                                    type="text" placeholder="Observaciones"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-3" style="text-align:center;">
                            <button id="send" type="submit" class="btn btn-success">Guardar</button>
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
