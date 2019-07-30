@extends('admin.admin')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Información Persona</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Reporte <small>Detallado</small></h2>
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
                        <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view"
                                        src="{{asset('imagenes/persona/'.$Persona[0]->url_imagen)}}" alt="Avatar"
                                        title="Change the avatar">
                                </div>
                            </div>
                            <h3>{{$Persona[0]->nombre .' ' .$Persona[0]->apellido}}</h3>

                            <ul class="list-unstyled user_data">
                                <li><i class="fa fa-envelope user-profile-icon"></i> Correo: {{$Persona[0]->correo}}
                                </li>

                                <li>
                                    <i class="fa fa-phone user-profile-icon"></i> Telefono: {{$Persona[0]->telefono}}
                                </li>
                                <li>
                                    <i class="fa fa-phone user-profile-icon"></i> Celular: {{$Persona[0]->celular}}
                                </li>
                                <li>
                                    <i class="fa fa-thumbs-up user-profile-icon"></i> :
                                    {{$Persona[0]->nombretipoperson}}
                                </li>
                            </ul>
                            <a class="btn btn-success"
                                href="{{URL::action('PersonaController@edit',$Persona[0]->id)}}"><i
                                    class="fa fa-edit m-right-xs"></i></a>
                            <br />
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">

                            <div class="profile_title">
                                <div class="col-md-6">
                                    <h2>Datos</h2>
                                </div>
                            </div>
                            <!-- start of user-activity-graph -->
                            <div id="graph_bar" style="width:100%; height:280px;">
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="x_content">
                                        <ul class="list-unstyled timeline">
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>{{$Persona[0]->nombretipodocumento}}</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->numero_documento}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Fecha Nacimimiento</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->fecha_nacimiento}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Ciudad Nacimiento</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->nombreciudadn}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="x_content">
                                        <ul class="list-unstyled timeline">
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Genero</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->nombregenero}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Sede</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->nombresede}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Barrio</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->nombrebarrio}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Estado</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : @if($Persona[0]->estado == 1) ACTIVO @else INACTIVO
                                                                @endif</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Observaciones</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->observaciones}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback">
                                    <div class="x_content">
                                        <ul class="list-unstyled timeline">
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Direccion</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->direccion_residencia}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Ocupacion</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->nombreocupacion}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>RH</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->rh}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="x_content">
                                        <ul class="list-unstyled timeline">
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>EPS</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->eps}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Estrato</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->estrato}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Nivel Sisben</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->nivel_sisben}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="block">
                                                    <div class="tags">
                                                        <a href="" class="tag">
                                                            <span>Como C. P.</span>
                                                        </a>
                                                    </div>
                                                    <div class="block_content">
                                                        <h2 class="title">
                                                            <a> : {{$Persona[0]->como_llego_a_piccolino}}</a>
                                                        </h2>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>

                                </div>


                            </div>
                            <!-- end of user-activity-graph -->
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                    <ul id="myTab" class="nav nav-tabs " role="tablist">
                                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab"
                                                role="tab" data-toggle="tab" aria-expanded="true">Contactos</a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_content2" role="tab"
                                                id="profile-tab" data-toggle="tab" aria-expanded="false">Documentos
                                            </a>
                                        </li>
                                        <li role="presentation" class=""><a href="#tab_content3" role="tab"
                                                id="profile-tab2" data-toggle="tab" aria-expanded="false">Usuarios</a>
                                        </li>
                                    </ul>
                                    <div class="row">
                                        <div id="myTabContent" class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade active in" id="tab_content1"
                                                aria-labelledby="home-tab">
                                                <!-- start recent activity -->
                                                <div class="table-responsive">
                                                    <table class="data table table-striped ">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Telefono</th>
                                                                <th class="hidden-phone">Correo</th>
                                                                <th>Parentesco</th>
                                                                <th>Observaciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($Contactos as $items)
                                                            <tr class="selected">
                                                                <td>{{$items->nombre}}</td>
                                                                <td>{{$items->telefono}}</td>
                                                                <td>{{$items->correo}}</td>
                                                                <td class="hidden-phone">{{$items->parentezco}}</td>
                                                                <td>{{$items->observaciones}}
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- end recent activity -->
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content2"
                                                aria-labelledby="profile-tab">

                                                <!-- start user projects -->
                                                <div class="table-responsive">
                                                    <table class="data table table-striped no-margin">
                                                        <thead>
                                                            <tr>
                                                                <th>Tipo</th>
                                                                <th>Nombre</th>
                                                                <th>Fecha</th>
                                                                <th>Entidad</th>
                                                                <th>Sede</th>
                                                                <th>Ubicación</th>
                                                                <th>Observaciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($Documentos as $items)
                                                            <tr class="selected">
                                                                <td>{{$items->nombreti}}</td>
                                                                <td>{{$items->nombre}}</td>
                                                                <td>{{$items->fecha_obtencion}}</td>
                                                                <td>{{$items->nombre_entidad}}</td>
                                                                <td>{{$items->nombresede}}</td>
                                                                <td>{{$items->ubicacion}}</td>
                                                                <td>{{$items->observaciones}}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- end user projects -->

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="tab_content3"
                                                aria-labelledby="profile-tab">
                                                <div class="table-responsive">
                                                    <table class="data table table-striped ">
                                                        <thead>
                                                            <tr>
                                                                <th>Nombre</th>
                                                                <th>Correo</th>
                                                                <th>Perfil</th>
                                                                <th>Imagen</th>
                                                                <th>Estado</th>
                                                                <th>Opciones</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($User as $items)
                                                            <tr class="selected">
                                                                <td>{{$items->name}}</td>
                                                                <td>{{$items->email}}</td>
                                                                <td>{{$items->nombrerol}}</td>
                                                                <td>
                                                                    <img src="{{asset('imagenes/Users/'.$items->urlimagen)}}"
                                                                        alt="Foto" height="60px" width="70px"
                                                                        class="img-thumbnail">
                                                                </td>
                                                                <td>@if($items->estado == 1) ACTIVO @else INACTIVO
                                                                    @endif</td>
                                                                    <td><a href="{{URL::action('UserController@edit',$items->id)}}"><button type="button" class="btn btn-round bg-orange btn-flat"><i class="fa fa-edit"></i></button></a>
                                                                    </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
@endsection