@extends('admin.admin')
@section('contenido')

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Listado <small> Semestre</small></h3>
            </div>

            @include('semestre.search')
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
                            <table class="table table-striped jambo_table bulk_action">
                                <thead>
                                    <tr class="headings">
                                        <th class="column-title">Fecha de inicio </th>
                                        <th class="column-title">Fecha de finalización </th>
                                        <th class="column-title">Código </th>
                                        <th class="column-title">Observaciones </th>
                                        <th class="column-title">Estado </th>
                                        <th class="column-title no-link last"><span class="nobr">Opciones</span>
                                        </th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($Semestre as $items)
                                    <tr class="even pointer">
                                        <td>{{$items->fecha_inicio}}</td>
                                        <td>{{$items->fecha_fin}}</td>
                                        <td>{{$items->codigo}}</td>
                                        <td>{{$items->observaciones}}</td>
                                        <td>@if($items->estado == 1) ACTIVO @else INACTIVO @endif</td>
                                        <td>
                                            <a href="{{URL::action('SemestreController@edit',$items->id)}}"><button type="button" class="btn btn-round btn-success"><i class="fa fa-edit"></i></button></a>
                                            <a href="" data-target="#modal-delete-{{$items->id}}"
                                                data-toggle="modal"><button type="button" class="btn btn-round btn-warning"><i class="fa fa-times"></i></button></a>
                                        </td>
                                    </tr>
                                    @include('semestre.modal')
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{$Semestre->render()}}
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- /page content -->



@endsection