@extends('admin.admin')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
        <div class="">
          <div class="page-title">
          </div>

          <div class="clearfix"></div>

          <div class="row">
            <div class="col-md-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Infromación del grupo</h2>
                  <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
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
                  <section class="content invoice">
                    <!-- title row -->
                    <div class="row">
                      <div class="col-xs-12 invoice-header">
                        <h1><i class="fa fa-users"></i>       {{$Grupo->codigo}}. <small class="pull-right">fecha : {{ date('Y-m-d H:i:s') }}</small> </h1>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                      <div class="col-sm-4 invoice-col">
                            Monitor de grupo
                        <address>
                                        <strong>{{$Persona[0]->nombre}}  {{$Persona[0]->apellido}}</strong>
                                        <br><strong>CC:  {{$Persona[0]->numero_documento}}</strong>
                                        <br><strong>Telefono:</strong> {{$Persona[0]->celular}}
                                        <br><strong>Correo:</strong> {{$Persona[0]->correo}}
                                    </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        Sede
                        <address>
                                        <strong>{{$Sede[0]->nombre}}</strong>
                                        <br><strong>Barrio:</strong> {{$Sede[0]->nombrebarrio}}
                                        <br><strong>Detalle:</strong> {{$Sede[0]->observaciones}}
                                    </address>
                      </div>
                      <!-- /.col -->
                      <div class="col-sm-4 invoice-col">
                        <b>Semestre</b>
                        <address>
                                <strong>{{$Semestre[0]->codigo}}</strong>
                                <br><strong>Fechas:</strong> {{$Semestre[0]->fecha_inicio}} - {{$Semestre[0]->fecha_fin}}
                                <br><strong>Detalle:</strong> {{$Sede[0]->observaciones}}
                            </address>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    <div class="col-md-12">
                            <div class="x_panel">
                              <div class="x_title">
                                <h2>ESTUDIANTES</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                  <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                  </li>
                                  
                                </ul>
                                <div class="clearfix"></div>
                              </div>
                              <div class="x_content">
                                <ul class="list-unstyled msg_list">
                                        @foreach ($Matricula as $items)
                                  <li>
                                    <a>
                                      <span class="image">
                                        <img src="{{asset('imagenes/persona/'.$items->url_imagen)}}" alt="img"  style=" width: 60px;  height: 50px; "/>
                                      </span>
                                      <span>
                                        <span>nombre: {{$items->nombrepersona}}  {{$items->apellido}} |</span>
                                      </span>
                                      <span>
                                            <span>CC: {{$items->numero_documento}} |</span>
                                      </span>
                                      
                                      <span>
                                            <span>Telefono: {{$items->celular}} |</span>
                                      </span>
                                      <span>
                                            <span>Correo: {{$items->correo}} |</span>
                                      </span>
                                      <span>
                                          <span>Código Matricula: {{$items->id}} |</span>
                                    </span>
                                      <span class="message">
                                        {{$items->detallepersona}}
                                      </span>
                                    </a>
                                    <a href="" data-target="#modal-delete-{{$items->id}}"
                                            data-toggle="modal"><button type="button"
                                                class="btn btn-round "><i
                                                    class="fa fa-user-times"></i></button></a>
                                  </li>
                                  @include('grupo.modalinactivarestudiente')
                                  @endforeach
                                </ul>
                              </div>
                            </div>
                          </div>

                    <!-- Table row -->
                    <div class="col-md-12">
                      <div class="x_panel" style="height: auto;">
                        <div class="x_title">
                          <h2>MATERIAS</h2>
                          <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            
                          </ul>
                          <div class="clearfix"></div>
                        </div>
                        <div class="x_content bs-example-popovers" style="display: none;">
                          @foreach ($Materia as $items)
                          <div class="alert alert-{{$ArrayColores[array_rand($ArrayColores,1)]}} alert-dismissible fade in" role="alert">
                            <a href="" data-target="#modal-deletemateria-{{$items->id}}"
                              data-toggle="modal"><button type="button"
                                  class="btn btn-round "><i
                                      class="fa fa-times"></i></button></a>
                            <strong>{{$items->nombre}}</strong>   | Código: {{$items->codigo}}    | Creditos: {{$items->creditos}}.
                          </div>
                          @include('grupo.modalinactivarmateria')
                          @endforeach
                        </div>
                      </div>
                    </div>
                    <!-- /.row -->

                    <div class="row">
                      <!-- accepted payments column -->
                      <div class="col-xs-6">
                        <p class="lead">Estado: {{$Estado[0]->nombre}}</p>
                         
                      </div>
                      <!-- /.col -->
                      <div class="col-xs-6">
                        <p class="lead">Contabilidad </p>
                        <div class="table-responsive">
                          <table class="table">
                            <tbody>
                              <tr>
                                <th style="width:50%">Subtotal:</th>
                                <td>$250.30</td>
                              </tr>
                              <tr>
                                <th>Tax (9.3%)</th>
                                <td>$10.34</td>
                              </tr>
                              <tr>
                                <th>Shipping:</th>
                                <td>$5.80</td>
                              </tr>
                              <tr>
                                <th>Total:</th>
                                <td>$265.24</td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                  </section>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /page content -->

@endsection