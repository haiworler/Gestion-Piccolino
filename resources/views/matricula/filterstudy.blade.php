@extends('admin.admin')
@section('contenido')
<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Buscar Estudiante</h3>
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
          {!!Form::open(array('url'=>'/ConsultStudent','method'=>'POST','autocomplete'=>'off'))!!}
          {{Form::token()}}
        <div class="">
          <div class="x_content">
            <div class="row">
              <div class="col-md-4 col-xs-12 widget widget_tally_box">
              </div>
              <div class="col-md-4 col-xs-12 widget widget_tally_box">
                <div class="x_panel fixed_height_390">
                  <div class="x_content">

                    <div class="flex">
                      <ul class="list-inline widget_profile_box">
                        <li>
                          <a>
                            <i class="fa fa-pagelines"></i>
                          </a>
                        </li>
                        <li>
                          <img src="{{asset('images/user.png')}}" alt="..." class="img-circle profile_img">
                        </li>
                        <li>
                          <a>
                            <i class="fa fa-pied-piper"></i>
                          </a>
                        </li>
                      </ul>
                    </div>
                    <h3 class="name">Maestro Aprendeiz</h3>
                    <div class="flex">
                      <div class="title_right">
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group pull-right top_search">
                          <div class="input-group">
                            <input type="number" class="form-control" name="codigoestudiante" id="codigoestudiante" placeholder="Código Estudiante...">
                            <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Buscar</button>
                            </span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <p>
                      Por favor indique el codigo del estudiante al cual se le realizara la matricula.
                    </p>
                  </div>
                </div>
              </div>
              <div class="col-md-4 col-xs-12 widget widget_tally_box">
              </div>
            </div>
          </div>
        </div>
        {!!Form::close()!!}
      </div>
    </div>
  </div>
</div>
</div>
<!-- /page content -->

@endsection