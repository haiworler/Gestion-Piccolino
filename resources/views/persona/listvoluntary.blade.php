@extends('admin.admin')
@section('contenido')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Listado <small> Voluntarios</small></h3>
            </div>

            @include('persona.searchvoluntary')
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Maestros <small>Aprendices</small></h2>
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

                    <div class="x_content">
                        <div class="table-responsive">
                            <table class="table table-striped jambo_table bulk_action ">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Nombres </th>
                                        <th class="column-title">Apellidos </th>
                                        <th class="column-title">N-Documento </th>
                                        <th class="column-title">Telefono </th>
                                        <th class="column-title">Celular </th>
                                        <th class="column-title">Correo </th>
                                        <th class="column-title">Direccion </th>
                                        <th class="column-title">Imagen </th>
                                        <th class="column-title">Estado </th>
                                        <th class="column-title no-link last"><span class="nobr">Opciones</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($persona as $items)
                                    <tr class="even pointer">
                                        <td>{{$items->nombre}}</td>
                                        <td>{{$items->apellido}}</td>
                                        <td>{{$items->numero_documento}}</td>
                                        <td>{{$items->telefono}}</td>
                                        <td>{{$items->celular}}</td>
                                        <td>{{$items->correo}}</td>
                                        <td>{{$items->direccion_residencia}}</td>
                                        <td>
                                            <img src="{{asset('imagenes/persona/'.$items->url_imagen)}}" alt="Foto" height="60px" width="70px"  class="img-thumbnail">
                                        </td>
                                        <td>@if($items->estado == 1) ACTIVO @else INACTIVO @endif</td>
                                        <td>
                                            <a href="{{URL::action('PersonaController@edit',$items->id)}}"><button type="button" class="btn btn-round btn-success"><i class="fa fa-edit"></i></button></a>
                                            <a href="" data-target="#modal-delete-{{$items->id}}"
                                                data-toggle="modal"><button type="button" class="btn btn-round btn-warning"><i class="fa fa-user-times"></i></button></a>
                                                <a href="detailperson/{{$items->id}}"><button type="button" class="btn btn-round bg-purple"><i class="fa fa-wpforms"></i></button></a>
                                                <a href="assign/{{$items->id}}/user"><button type="button" class="btn btn-round btn-info"><i class="fa fa-user-md"></i></button></a>
                                        </td>
                                    </tr>
                                    @include('persona.modal')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$persona->render()}}
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- /page content -->

@endsection