@extends('admin.admin')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Registro Semestre</h3>
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
                        <h2>Nuevo<small> Semestre</small></h2>
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
                    {!!Form::open(array('url'=>'semestre','method'=>'POST','autocomplete'=>'off'))!!}
                    {{Form::token()}}
                    <div class="x_content">
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Fecha Ini</label>
                            <div class="form-group">
                                <input type='date' class="form-control" name="fechainicio"
                                    placeholder="Fecha inicio Semestre" required="required" />
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Fecha Fin</label>
                            <div class="form-group">
                                <input type='date' class="form-control" name="fechafin"
                                    placeholder="Fecha finalización Semestre" required="required" />
                            </div>
                        </div>
                        <div class="row calendar-exibit">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                <input type="text" class="form-control has-feedback-left" id="codigo" name="codigo"
                                    placeholder="Código Semestre" required value="{{old('codigo')}}">
                                <span class="fa fa-barcode form-control-feedback left " aria-hidden="true"></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <textarea class=" form-control" rows="1" name="observaciones" required="required"
                                    type="text" placeholder="Observaciones"></textarea>
                            </div>

                        </div>
                        <div class="panel panel-primary">
                            <div class="panel-body">
                                <h3>
                                    <p class="text-center">Asignación Corte</p>
                                </h3>
                                <div class="col-lg-8 col-md-6 col-sm-8  col-xs-12 form-group has-feedback">
                                    <select name="corte" id="corte" class="form-control selectpicker"
                                        data-live-search="true">
                                        @foreach ($Corte as $Items)
                                        <option value="{{$Items->id}}">{{$Items->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-2 col-xs-12">
                                    <button type="button" class="btn btn-succes" id="agregar">Agregar</button>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                <table id="tablacorte"
                                    class="table table-responsive table-bordered table-condesed table-hover">
                                    <thead>
                                        <th>Opcion</th>
                                        <th>Nombre</th>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
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
@section('scripts')
<script type="text/javascript">
    $(document).ready(function () {
        $('#agregar').click(function () {
            agregar();
        })
    });
    var contador = 0;
    var CantCorte = 0;
    var elementosagregados = [];

    function agregar() {
        var idcorte = $('#corte').val();
        var corte = $('#corte option:selected').text();
        if (!(elementosagregados.includes(idcorte))) {
            if (idcorte != "" && corte != "") {
                var fila = '<tr class="selected" id="fila' + contador +
                    '"><td><button type="button" class="btn btn-success btn-sm" id="quitar" onclick="eliminar(' +
                    contador +
                    ',' + idcorte + ');">X</button></td><td><input type="hidden" name="idcorte[]" value="' +
                    idcorte +
                    '">' + corte + '</td></tr>';
                contador++;
                limpiar();
                $('#tablacorte').append(fila);
                elementosagregados.push(idcorte);
                CantCorte = CantCorte + 1;
            } else {
                alert('Debe indicar el corte que desea agregar');
            }
        } else {
            alert('Este corte ya fue agregado');
        }
    }
    // Limpiar
    function limpiar() {
        $('#corte').val("");
    }
    //  Elimina los datos de los contactos
    function eliminar(index, idcorte) {
        $('#fila' + index).remove();
        var indece = elementosagregados.indexOf('' + idcorte + '');
        if (indece > -1) {
            elementosagregados.splice(indece, idcorte);
        }
        CantCorte = (CantCorte - 1);
    }
</script>
@endsection