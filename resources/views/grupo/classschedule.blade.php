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
            <h2>Crear Horario</h2>
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
                  <h1><i class="fa fa-users"></i> {{$Grupo->codigo}}. </h1>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Monitor de grupo
                  <address>
                    <strong>{{$Persona[0]->nombre}} {{$Persona[0]->apellido}}</strong>
                    <br><strong>CC: {{$Persona[0]->numero_documento}}</strong>
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
              <div class="row">
                <!-- accepted payments column -->
                <div class="col-xs-6">
                  <p class="lead">Estado: {{$Estado[0]->nombre}}</p>
                </div>
                <!-- /.col -->
              </div>
              <!--Nuevo ROW--->
              <div class="row">
                <div class="col-md-12">
                  <!-- form date pickers -->
                  <!-- /form datepicker -->
                  <!-- form datetimepicker -->
                  <div class="x_panel" style="">
                    <div class="x_title">
                      <h2>Date Pickers <small> Available with multiple designs</small></h2>
                      <ul class="nav navbar-right panel_toolbox">
                        
                        
                        
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                      <div class="container">
                        <div class="row">

                          <div class='col-sm-4'>
                            Basic Example
                            <div class="form-group">
                              <div class='input-group date' id='myDatepicker'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class='col-sm-4'>
                            Only Date Picker
                            <div class="form-group">
                              <div class='input-group date' id='myDatepicker2'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class='col-sm-4'>
                            Only Time Picker <small>For 24H format use format: 'HH:mm'</small>
                            <div class="form-group">
                              <div class='input-group date' id='myDatepicker3'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class='col-sm-4'>
                            Using ReadOnly
                            <div class="form-group">
                              <div class='input-group date' id='myDatepicker4'>
                                <input type='text' class="form-control" readonly="readonly" />
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>

                          <div class='col-sm-4'>
                            Linked Picker Parent
                            <div class="form-group">
                              <div class='input-group date' id='datetimepicker6'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>
                          <div class='col-sm-4'>
                            Linked Picker Children
                            <div class="form-group">
                              <div class='input-group date' id='datetimepicker7'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                  <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- /form datetimepicker -->
                  <!-- form grid slider -->
                  <!-- /form grid slider -->
                  <!-- image cropping -->
                  <!-- /image cropping -->
                </div>
              </div>
              <!----/Nuevo ROW---->
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
@section('scripts')
<script type="text/javascript">
   $('#myDatepicker').datetimepicker();

$('#myDatepicker2').datetimepicker({
    format: 'DD.MM.YYYY'
});

$('#myDatepicker3').datetimepicker({
    format: 'hh:mm A'
});

$('#myDatepicker4').datetimepicker({
    ignoreReadonly: true,
    allowInputToggle: true
});

$('#datetimepicker6').datetimepicker();

$('#datetimepicker7').datetimepicker({
    useCurrent: false
});

$("#datetimepicker6").on("dp.change", function(e) {
    $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
});

$("#datetimepicker7").on("dp.change", function(e) {
    $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
});

</script>
@endsection