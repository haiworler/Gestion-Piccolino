@extends('admin.admin')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Edición Persona</h3>
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
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Por favor solo modifique los datos necesarios <small> Ópciones</small></h2>
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
                    {!!Form::open(array('method'=>'PATCH','route'=>['persona.update',$Persona->id],'files'=>'true'))!!}
                    {{Form::token()}}
                    <div class="x_content">
                        <!-- Smart Wizard -->
                        <div id="wizard" class="form_wizard wizard_horizontal">
                            <ul class="wizard_steps">
                                <li>
                                    <a href="#step-1">
                                        <span class="step_no">1</span>
                                        <span class="step_descr">
                                            Estación 1<br />
                                            <small>Datos de la persona</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-2">
                                        <span class="step_no">2</span>
                                        <span class="step_descr">
                                            Estación 2<br />
                                            <small>Datos del contacto</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-3">
                                        <span class="step_no">3</span>
                                        <span class="step_descr">
                                            Estación 3<br />
                                            <small>Documento que entrega la persona</small>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#step-4">
                                        <span class="step_no">4</span>
                                        <span class="step_descr">
                                            Estación 4<br />
                                            <small>Confirmación</small>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                            <div id="step-1">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback mi-input">
                                        <input type="text" class="form-control has-feedback-left mi-input" id="nombres"
                                            name="nombres" placeholder="Nombres" value="{{$Persona->nombre}}">
                                        <span class="fa fa-user form-control-feedback left " aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control mi-input" id="apellidos" name="apellidos"
                                            placeholder="Apellidos" value="{{$Persona->apellido}}">
                                        <span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <select name="tipodocumento" id="tipodocumento"
                                            class="form-control selectpicker" data-live-search="true">
                                            @foreach ($TipoDocumento as $items)
                                            @if($items->id == $Persona->id_tipo_documento)
                                            <option value="{{$items->id}}" selected>{{$items->nombre}}</option>
                                            @else
                                            @if($items->archivo == 1)
                                            <option value="{{$items->id}}">{{$items->nombre}}</option>
                                            @endif
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="number" class="form-control" id="numerodocumento"
                                            name="numerodocumento" placeholder="Número"
                                            value="{{$Persona->numero_documento}}">
                                        <span class="fa fa-sort-numeric-asc form-control-feedback right"
                                            aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <span aria-hidden="true">Fecha Nacimiento</span>
                                        <input type="date" class="form-control" id="fechanacimiento"
                                            name="fechanacimiento" value="{{$Persona->fecha_nacimiento}}">
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <span aria-hidden="true">Ciudad de nacimiento</span>
                                        <select name="ciudadnacimiento" id="ciudadnacimiento"
                                            class="form-control selectpicker" data-live-search="true">
                                            @foreach ($CiudadNacimiento as $ciudad)
                                            @if($ciudad->id == $Persona->id_ciudad_de_nacimiento)
                                            <option value="{{$ciudad->id}}" selected>{{$ciudad->nombre}}</option>
                                            @else
                                            <option value="{{$ciudad->id}}">{{$ciudad->nombre}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <select name="genero" id="genero" class="form-control">
                                            @foreach ($Genero as $Items)
                                            @if($Items->id == $Persona->id_genero)
                                            <option value="{{$Items->id}}" selected>{{$Items->nombre}}</option>
                                            @else
                                            <option value="{{$Items->id}}">{{$Items->nombre}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                        <span class="fa  fa-venus-mars form-control-feedback right"
                                            aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="number" class="form-control" id="telefono" name="telefono"
                                            placeholder="Número de telefono" value="{{$Persona->telefono}}">
                                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="number" class="form-control" id="celular" name="celular"
                                            placeholder="Número de Celular" value="{{$Persona->celular}}">
                                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-right" id="correo"
                                            name="correo" placeholder="Correo" value="{{$Persona->correo}}">
                                        <span class="fa fa-envelope form-control-feedback right"
                                            aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-right" id="rh" name="rh"
                                            placeholder="RH" value="{{$Persona->rh}}">
                                        <span class="fa fa-ils form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-right" id="eps" name="eps"
                                            placeholder="EPS" value="{{$Persona->eps}}">
                                        <span class="fa fa-plus-square form-control-feedback right"
                                            aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <span aria-hidden="true">Localidad Residencia</span>
                                        <select name="localidad" id="idlocalidad" class="form-control selectpicker"
                                            data-live-search="true">
                                            @foreach ($Localidad as $items)
                                            @if($items->id == $Barrio[0]->id_localidad)
                                            <option value="{{$items->id}}" selected>{{$items->nombre}}</option>
                                            @else
                                            <option value="{{$items->id}}">{{$items->nombre}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <span aria-hidden="true">Barrio</span>
                                        <select name="idbarrio" id="idbarrio" class="form-control">
                                            @foreach ($Barrios as $items)
                                            @if($items->id == $Barrio[0]->id)
                                            <option value="{{$items->id}}" selected>{{$items->nombre}}</option>
                                            @else
                                            <option value="{{$items->id}}">{{$items->nombre}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="text" class="form-control has-feedback-right"
                                            id="direccionresidencia" name="direccionresidencia"
                                            placeholder="Direccion Residencia"
                                            value="{{$Persona->direccion_residencia}}">
                                        <span class="fa fa-strikethrough form-control-feedback right"
                                            aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <select name="estado" id="estado" class="form-control ">
                                            @foreach ($Arrayestado as $items)
                                            @if($items == $Persona->estado)
                                            <option value="{{$items}}" selected> @if($items == 1) ACTIVO @else INACTIVO
                                                @endif </option>
                                            @else
                                            <option value="{{$items}}"> @if($items == 1) ACTIVO @else INACTIVO @endif
                                            </option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <span aria-hidden="true">Estrato</span>
                                        <select name="estrado" id="estrado" class="form-control ">
                                            @foreach ($Arrayestrato as $items)
                                            @if($items == $Persona->estrato)
                                            <option value="{{$items}}" selected>{{$items}}</option>
                                            @else
                                            <option value="{{$items}}">{{$items}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <span aria-hidden="true">Ocupacion</span>
                                        <select name="idocupacion" id="idocupacion" class="form-control selectpicker"
                                            data-live-search="true">
                                            @foreach ($Ocupacion as $items)
                                            @if($items->id == $Persona->id_ocupacion)
                                            <option value="{{$items->id}}" selected>{{$items->nombre}}</option>
                                            @else
                                            <option value="{{$items->id}}">{{$items->nombre}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <input type="number" class="form-control has-feedback-right" id="nivelsisben"
                                            name="nivelsisben" placeholder="Nivel Sisben"
                                            value="{{$Persona->nivel_sisben}}">
                                        <span class="fa fa-strikethrough form-control-feedback right"
                                            aria-hidden="true"></span>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                        <select name="idsede" id="idsede" class="form-control selectpicker"
                                            data-live-search="true">
                                            @foreach ($Sede as $items)
                                            @if($items->id == $Persona->id_sede)
                                            <option value="{{$items->id}}" selected>{{$items->nombre}}</option>
                                            @else
                                            <option value="{{$items->id}}">{{$items->nombre}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input class=" form-control" rows="1" name="comoconociopiccolino"
                                            required="required" type="text" placeholder="Como conocia la fundacion ?"
                                            value="{{$Persona->como_llego_a_piccolino}}">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                            <div id="step-2">
                                <div class="row">
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <input type="text" class="form-control has-feedback-right" id="parentesco"
                                            name="parentesco" placeholder="Parentesco">
                                        <span class="fa fa-child form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <input type="text" class="form-control has-feedback-left" id="nombrecontacto"
                                            name="nombrecontacto" placeholder="Nombre Contacto">
                                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <input type="number" class="form-control" id="telefonocontacto"
                                            name="telefonocontacto" placeholder="Número de telefono Contacto">
                                        <span class="fa fa-phone form-control-feedback right" aria-hidden="true"></span>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <input type="text" class="form-control has-feedback-right" id="correocontacto"
                                            name="correocontacto" placeholder="Correo Contacto">
                                        <span class="fa fa-envelope form-control-feedback right"
                                            aria-hidden="true"></span>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <textarea class=" form-control" rows="1" id="observacioncontacto"
                                            name="observacioncontacto" type="text"
                                            placeholder="Observaciones "></textarea>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <button type="button" class="btn btn-success btn-sm"
                                            id="agregarcontacto">Agregar</button>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <table id="tablecontacto"
                                            class="table table-striped table-bordered table-condesed table-hover">
                                            <thead>
                                                <th>Opiones</th>
                                                <th>Parentesco</th>
                                                <th>Nombre</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Observacion</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($Contactos as $items)
                                                <tr class="selected" id="fila{{$items->id}}">
                                                    <td><button type="button" class="btn btn-success btn-sm" id="quitar"
                                                            onclick="eliminar({{$items->id}},{{$items->id}});">X</button>
                                                        <input type="hidden" name="idcontacto[]" value="{{$items->id}}">
                                                    </td>
                                                    <td><input type="text" name="listparentesco[]"
                                                            value="{{$items->parentezco}}"></td>
                                                    <td><input type="text" name="listnombrecontacto[]"
                                                            value="{{$items->nombre}}"></td>
                                                    <td><input type="text" name="listtelefonocontacto[]"
                                                            value="{{$items->telefono}}"></td>
                                                    <td><input type="text" name="listcorreocontacto[]"
                                                            value="{{$items->correo}}"></td>
                                                    <td><input type="text" name="listobservacioncontacto[]"
                                                            value="{{$items->observaciones}}">
                                                        <input type="hidden" name="CantidadContactos"
                                                            id="CantidadContactos" value=" {{count($Contactos)}}"></td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                            <div id="step-3">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 col-sm-3  col-xs-12 form-group has-feedback">
                                        <select name="tipodocumentodo" id="idtipodocumentodo"
                                            class="form-control selectpicker" data-live-search="true">
                                            @foreach ($TipoDocumento as $Items)
                                            @if($Items->archivo == 2)
                                            @if( $Items->id == 6)
                                            <option value="12">Seleccione el tipo de documento</option>
                                            @endif
                                            <option value="{{$Items->id}}">{{$Items->nombre}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <input type="text" class="form-control has-feedback-right" id="nombredo"
                                            name="nombredo" placeholder="Nombre del documento">
                                        <span class="fa fa-file-text-o form-control-feedback right"
                                            aria-hidden="true"></span>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <input type="text" class="form-control has-feedback-right" id="nombreentidaddo"
                                            name="nombreentidaddo" placeholder="Nombre Entidad">
                                        <span class="fa fa-university form-control-feedback right"
                                            aria-hidden="true"></span>
                                    </div>
                                    <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                                        <input type="text" class="form-control has-feedback-right" id="ubicaciondo"
                                            name="ubicaciondo" placeholder="Ubicación en Piccolino">
                                        <span class="fa fa-barcode form-control-feedback right"
                                            aria-hidden="true"></span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 col-sm-4 col-xs-12 form-group has-feedback">
                                        <span aria-hidden="true">Fecha Otención</span> <input type="date"
                                            class="form-control" id="fechado" name="fechado"
                                            placeholder="Fecha de Obtención del documento">
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <textarea class=" form-control" rows="2" id="observaciondo" name="observaciondo"
                                            type="text" placeholder="Observaciones del documento "></textarea>
                                    </div>
                                    <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                        <button type="button" class="btn btn-success btn-lg"
                                            id="agregardo">Agregar</button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <table id="tablado"
                                            class="table table-responsive table-bordered table-condesed table-hover">
                                            <thead>
                                                <th>Opc</th>
                                                <th>Documento</th>
                                                <th>Nombre</th>
                                                <th>Entidad</th>
                                                <th>Ubicacion</th>
                                                <th>Fecha</th>
                                                <th>Observación</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($Documentos as $items)
                                                <tr class="selected" id="filado{{$items->id}}">
                                                    <td><button type="button" class="btn btn-success btn-sm"
                                                            id="quitardo"
                                                            onclick="eliminardo({{$items->id}},{{$items->id}});">X</button>
                                                        <input type="hidden" name="iddocumentopersona[]"
                                                            value="{{$items->id}}"></td>
                                                    <td><input type="hidden" name="iddocimento[]"
                                                            value="{{$items->id_tipo_documento}}">{{$items->nombreti}}
                                                    </td>
                                                    <td><input type="text" name="listnombredo[]"
                                                            value="{{$items->nombre}}"></td>
                                                    <td><input type="text" name="listnombreentidaddo[]"
                                                            value="{{$items->nombre_entidad}}"></td>
                                                    <td><input type="text" name="listubicaciondo[]"
                                                            value="{{$items->ubicacion}}"></td>
                                                    <td><input type="text" name="listfechado[]"
                                                            value="{{$items->fecha_obtencion}}"></td>
                                                    <td><input type="text" name="listobservaciondo[]"
                                                            value="{{$items->observaciones}}">
                                                        <input type="hidden" name="CantidadDocumentos"
                                                            id="CantidadDocumentos" value=" {{count($Documentos)}}">
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                            <div id="step-4">
                                <div class="row">
                                    <div class="input-group input-file">
                                        <div class="form-control">
                                            <a target="_blank">Debe Seleccionar una imagen de tipo PNG o JPG</a>
                                        </div>
                                        <span class="input-group-addon">
                                            <a class='btn btn-primary' href='javascript:;'>
                                                Imagen
                                                <input type="file" name="imagen"
                                                    onchange="$(this).parent().parent().parent().find('.form-control').html($(this).val());">
                                            </a>
                                        </span>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6  col-xs-12 form-group has-feedback">
                                        <select name="tipopersona" id="tipopersona" class="form-control selectpicker"
                                            data-live-search="true">
                                            @foreach ($TipoPersona as $Items)
                                            @if($Items->id == $Persona->id_tipo_persona)
                                            <option value="{{$Items->id}}" selected>{{$Items->nombre}}</option>
                                            @else
                                            <option value="{{$Items->id}}">{{$Items->nombre}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <input class=" form-control" rows="1" id="observacionpersona"
                                            name="observacionpersona" type="text"
                                            placeholder="Observaciones De la persona "
                                            value="{{$Persona->observaciones}}">
                                    </div>
                                </div>
                                <br>
                                <br>
                                <br>
                                <br>
                                <br>
                            </div>
                            <input name="_token" value="{{ csrf_token()}}" type="hidden">
                        </div>
                        <!-- End SmartWizard Content -->
                        {!!Form::close()!!}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- /page content -->
@endsection
@section('scripts')
<script src="/js/selectdinamicoedit.js"></script>
<script src="/js/wizardvalidation.js"></script>
<script src="/js/Borrar.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#agregarcontacto').click(function () {
            agregar();
        })
        $('#agregardo').click(function () {
            agregardo();
        })
    });
    var contador = 0;
    var CantContac = $('#CantidadContactos').val();

    function agregar() {
        var parentesco = $('#parentesco').val();
        var nombrecontacto = $('#nombrecontacto').val();
        var telefonocontacto = $('#telefonocontacto').val();
        var correocontacto = $('#correocontacto').val();
        var observacioncontacto = $('#observacioncontacto').val();
        if (parentesco != "" && nombrecontacto != "" && telefonocontacto != "") {
            var fila = '<tr class="selected" id="fila' + contador +
                '"><td><button type="button" class="btn btn-success btn-sm" id="quitar" onclick="eliminar(' + contador +
                ',null);">X</button><input type="hidden" name="idcontacto[]" value=""</td><td><input type="text" name="listparentesco[]" value="' +
                parentesco +
                '"></td><td><input type="text" name="listnombrecontacto[]" value="' + nombrecontacto +
                '"></td><td><input type="text" name="listtelefonocontacto[]" value="' + telefonocontacto +
                '"></td> <td><input type="text" name="listcorreocontacto[]" value="' + correocontacto +
                '"></td><td><input type="text" name="listobservacioncontacto[]" value="' + observacioncontacto +
                '"></td></tr>';
            contador++;
            limpiar();
            $('#tablecontacto').append(fila);
            CantContac = CantContac + 1;
        } else {
            alert('Debe indicar el parentesco, el nombre contacto y el telefono del cotacto');
        }
    }
    // Limpiar formulario de contacto
    function limpiar() {
        $('#parentesco').val("");
        $('#nombrecontacto').val("");
        $('#telefonocontacto').val("");
        $('#correocontacto').val("");
        $('#observacioncontacto').val("");
    }
    //  Elimina los datos de los contactos
    function eliminar(index, id) {
        if (!(id == null || id.length == 0)) {
            if (CantContac != 1) {
                BorrarContacto(id);
            }
        }
        $('#fila' + index).remove();
        CantContac = CantContac - 1;
    }
    var contadordo = 0;
    var CantDoc = $('#CantidadDocumentos').val();

    function agregardo() {
        var iddocumento = $('#idtipodocumentodo').val();
        var documento = $('#idtipodocumentodo option:selected').text();
        var nombredo = $('#nombredo').val();
        var nombreentidaddo = $('#nombreentidaddo').val();
        var ubicaciondo = $('#ubicaciondo').val();
        var fechado = $('#fechado').val();
        var observaciondo = $('#observaciondo').val();
        if (nombredo != "" && nombreentidaddo != "" && ubicaciondo != "") {
            var filado = '<tr class="selected" id="filado' + contadordo +
                '"><td><button type="button" class="btn btn-success btn-sm" id="quitardo" onclick="eliminardo(' +
                contadordo +
                ',null);">X</button><input type="hidden" name="iddocumentopersona[]" value=""></td><td><input type="hidden" name="iddocimento[]" value="' +
                iddocumento +
                '">' + documento + '</td><td><input type="text" name="listnombredo[]" value="' + nombredo +
                '"></td><td><input type="text" name="listnombreentidaddo[]" value="' + nombreentidaddo +
                '"></td> <td><input type="text" name="listubicaciondo[]" value="' + ubicaciondo +
                '"></td><td><input type="text" name="listfechado[]" value="' + fechado +
                '"></td><td><input type="text" name="listobservaciondo[]" value="' + observaciondo + '"></td></tr>';
            contador++;
            limpiardo();
            $('#tablado').append(filado);
            CantDoc = CantDoc + 1;
        } else {
            alert('Error for favor verifique los datos del documento');
        }
    }
    // Funcion que elimina la fila del documento
    function eliminardo(index, id) {
        if (!(id == null || id.length == 0)) {
            if (CantDoc != 1) {
                BorrarDocumento(id);
            }
        }
        $('#filado' + index).remove();
        CantDoc = CantDoc - 1;
    }
    // Function que Limpia el formulario
    function limpiardo() {
        $('#nombredo').val("");
        $('#nombreentidaddo').val("");
        $('#ubicaciondo').val("");
        $('#observaciondo').val("");
        $('#fechado').val("");
    }

    //$ ('# wizard'). smartWizard.defaults.labelFinish = "confirmar y comprar";
</script>
@endsection