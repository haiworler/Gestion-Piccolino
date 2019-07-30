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
            <h2>Infromación</h2>
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                    class="fa fa-wrench"></i></a>
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
                  <h1><i class="fa fa-wpforms"></i> {{$Materia->nombre}} </h1>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Detalle
                  <address>
                    <strong>Creditos: {{$Materia->creditos}}</strong>
                    <br><strong>Estado: @if($Materia->estado == 1) ACTIVO @else INACTIVO @endif</strong>
                    <br><strong>Código:</strong> {{$Materia->codigo}}
                    <br><strong>Fecha Hora Registro:</strong> {{$Materia->fecha_registro}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 <!-- Sede
                  <address>
                  </address>-->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 <!-- <b>Semestre</b>
                  <address>
                  </address>-->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
              <div class="col-md-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Maestros</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>

                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <ul class="list-unstyled msg_list">
                      @foreach ($MaestrosMateria as $items)
                      <li>
                        <a>
                          <span class="image">
                            <img src="{{asset('imagenes/persona/'.$items->url_imagen)}}" alt="img"
                              style=" width: 60px;  height: 50px; " />
                          </span>
                          <span>
                            <span>nombre: {{$items->nombre}} {{$items->apellido}} |</span>
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
                          
                        </a>
                        <a href="" data-target="#modal-delete-{{$items->idmp}}" data-toggle="modal"><button type="button"
                            class="btn btn-round "><i class="fa fa-user-times"></i></button></a>
                      </li>
                      @include('materia.modalinactivarmaestro')
                      @endforeach
                    </ul>
                  </div>
                </div>
              </div>

              <!-- Table row -->
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead">Observaciones: {{$Materia->observaciones}}</p>

                </div>
                <!-- /.col -->
              
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