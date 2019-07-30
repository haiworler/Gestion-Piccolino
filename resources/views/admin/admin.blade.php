<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="{{asset('faviconPic.ico')}}" type="image/ico" />

  <title>Sistema Piccolino</title>

  <!-- Bootstrap -->
  <link href="{{asset('vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{asset('vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <!--Hoja de estilo libreria para select dinamico--->
  <link href="{{asset('css/bootstrap-select.min.css')}}" rel="stylesheet">
  <!-- Micss -->
  <link href="{{asset('css/miscss.css')}}" rel="stylesheet">
  <link href="{{asset('css/bootstrap-datetimepicker.css')}}" rel="stylesheet">
  <!-- NProgress -->
  <link href="{{asset('vendors/nprogress/nprogress.css" rel="stylesheet')}}">
  <!-- iCheck -->
  <link href="{{asset('vendors/iCheck/skins/flat/green.css" rel="stylesheet')}}">
  <!-- iCheck -->
  <link href="{{asset('vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
  <!-- bootstrap-progressbar -->
  <link href="{{asset('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet">
  <!-- JQVMap -->
  <link href="{{asset('vendors/jqvmap/dist/jqvmap.min.css')}}" rel="stylesheet" />
  <!-- bootstrap-daterangepicker -->
  <link href="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.css')}}" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="{{asset('build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="nav-md">
  <div class="container body">
    <div class="main_container">
      <div class="col-md-3 left_col">
        <div class="left_col scroll-view">
          <div class="navbar nav_title" style="border: 0;">
            <a href="index.html" class="site_title"><i class="fa fa-hand-peace-o"></i> <span>Sistema
                Piccolino</span></a>
          </div>

          <div class="clearfix"></div>

          <!-- menu profile quick info -->
          <div class="profile clearfix">
            <div class="profile_pic">
              <img src="{{asset('imagenes/Users/'.auth()->user()->urlimagen)}}" alt="..."
                class="img-circle profile_img">
            </div>
            <div class="profile_info">
              <span>Bienvenido</span>
              <h2>{{auth()->user()->name}}</h2>
            </div>
          </div>
          <!-- /menu profile quick info -->
          <br />
          <!-- sidebar menu -->
          <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
              <h3>General</h3>
              <ul class="nav side-menu">
                <li><a href="{{ url('/home') }}"><i class="fa fa-home"> </i>Menú</a>
                </li>
                <li><a><i class="fa fa-users"></i> Personas <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('/persona')}}">Lista Estudiantes</a></li>
                    <li><a href="{{ url('/listvoluntary')}}">Listado Voluntarios</a></li>
                    <li><a href="{{ url('/persona/create') }}">Registrar Persona</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-calendar-plus-o"></i> Semestre <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('/semestre/create')}}">Registrar</a></li>
                    <li><a href="{{ url('/semestre')}}">Listado</a></li>
                    <li><a href="{{ url('/corte')}}">Gestion de Cortes</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-gg"></i> Grado <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('/grado')}}">Gestion de Grados</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-folder-open"></i> Matricula <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('/matricula')}}">Listado Matricula</a></li>
                    <li><a href="{{ url('/filterstudy')}}">Registro Matricula</a></li>
                    <li><a href="{{ url('/costomatricula')}}">Gestion de Costos</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-medium"></i> Materia <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('materia')}}">Listado de materias</a></li>
                    <li><a href="{{ url('/materia/create')}}">Registrar</a></li>
                  </ul>
                </li>
                <li><a><i class="fa fa-braille"></i> Gestion de Grupos <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ url('grupo')}}">Listado de Grupos</a></li>
                    <li><a href="{{ url('/grupo/create')}}">Registrar</a></li>

                  </ul>
                </li>

              </ul>
            </div>


          </div>
          <!-- /sidebar menu -->

          <!-- /menu footer buttons -->
          <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Settings">
              <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
              <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Lock">
              <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
              <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
          </div>
          <!-- /menu footer buttons -->
        </div>
      </div>

      <!-- top navigation -->
      <div class="top_nav">
        <div class="nav_menu">
          <nav>
            <div class="nav toggle">
              <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div>

            <ul class="nav navbar-nav navbar-right">
              <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                  aria-expanded="false">
                  <img src="{{asset('imagenes/Users/'.auth()->user()->urlimagen)}}" alt="">{{auth()->user()->name}}
                  <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                  <li><a href="javascript:;"> Profile</a></li>
                  <li>
                    <a href="javascript:;">
                      <span class="badge bg-red pull-right">50%</span>
                      <span>Settings</span>
                    </a>
                  </li>
                  <li><a href="javascript:;">Help</a></li>
                  <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Cerrar Sesión</a></li>
                </ul>
              </li>

              <li role="presentation" class="dropdown">
                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                  <i class="fa fa-envelope-o"></i>
                  <span class="badge bg-green">6</span>
                </a>
                <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                  <li>
                    <a>
                      <span class="image"><img src="{{asset('images/user.png')}}" alt="Profile Image" /></span>
                      <span>
                        <span>John Smith</span>
                        <span class="time">3 mins ago</span>
                      </span>
                      <span class="message">
                        Film festivals used to be do-or-die moments for movie makers. They were where...
                      </span>
                    </a>
                  </li>
                  <li>
                  </li>
                  <li>
                  </li>
                  <li>
                  </li>
                  <li>
                    <div class="text-center">
                      <a>
                        <strong>See All Alerts</strong>
                        <i class="fa fa-angle-right"></i>
                      </a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </nav>
        </div>
      </div>
      <!-- /top navigation -->

      <!-- page content -->
      @yield('contenido')
      <!-- /page content -->

      <!-- footer content -->
      <footer>
        <div class="pull-right">
          Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
        </div>
        <div class="clearfix"></div>
      </footer>
      <!-- /footer content -->
    </div>
  </div>

  <!-- jQuery -->
  <script src="{{asset('vendors/jquery/dist/jquery.min.js')}}"></script>
  <!-- Bootstrap -->
  <script src="{{asset('vendors/bootstrap/dist/js/bootstrap.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
  <!-- NProgress -->
  <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
  <!-- jQuery Smart Wizard -->
  <script src="{{asset('vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>
  <!-- validator -->
  <script src="{{asset('vendors/validator/validator.js')}}"></script>
  <!-- Chart.js -->
  <script src="{{asset('vendors/Chart.js/dist/Chart.min.js')}}"></script>
  <!-- gauge.js -->
  <script src="{{asset('vendors/gauge.js/dist/gauge.min.js')}}"></script>
  <!-- bootstrap-progressbar -->
  <script src="{{asset('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
  <!-- Skycons -->
  <script src="{{asset('vendors/skycons/skycons.js')}}"></script>
  <!-- Flot -->
  <script src="{{asset('vendors/Flot/jquery.flot.js')}}"></script>
  <script src="{{asset('vendors/Flot/jquery.flot.pie.js')}}"></script>
  <script src="{{asset('vendors/Flot/jquery.flot.time.js')}}"></script>
  <script src="{{asset('vendors/Flot/jquery.flot.stack.js')}}"></script>
  <script src="{{asset('vendors/Flot/jquery.flot.resize.js')}}"></script>
  <!-- Flot plugins -->
  <script src="{{asset('vendors/flot.orderbars/js/jquery.flot.orderBars.js')}}"></script>
  <script src="{{asset('vendors/flot-spline/js/jquery.flot.spline.min.js')}}"></script>
  <script src="{{asset('vendors/flot.curvedlines/curvedLines.js')}}"></script>
  <!-- DateJS -->
  <script src="{{asset('vendors/DateJS/build/date.js')}}"></script>
  <!-- JQVMap -->
  <script src="{{asset('vendors/jqvmap/dist/jquery.vmap.js')}}"></script>
  <script src="{{asset('vendors/jqvmap/dist/maps/jquery.vmap.world.js')}}"></script>
  <script src="{{asset('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js')}}"></script>
  <!-- bootstrap-daterangepicker -->
  <script src="{{asset('vendors/moment/min/moment.min.js')}}"></script>
  <script src="{{asset('vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

  <!-- Custom Theme Scripts -->
  <script src="{{asset('build/js/custom.min.js')}}"></script>
  <!-- bootstrap-select -->
  <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
  <script src="{{asset('js/moment.min.js')}}"></script>
  <script src="{{asset('js/bootstrap-datetimepicker.min.js')}}"></script>
  <!-- iCheck -->
  <script src="{{asset('vendors/iCheck/icheck.min.js')}}"></script>
  <!-- FastClick -->
  <script src="{{asset('vendors/fastclick/lib/fastclick.js')}}"></script>
  <!-- NProgress -->
  <script src="{{asset('vendors/nprogress/nprogress.js')}}"></script>
  <!--Scripts--->
  <!-- Datatables -->
  <script src="{{asset('vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
  <script src="{{asset('vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
  <script src="{{asset('vendors/jszip/dist/jszip.min.js')}}"></script>
  <script src="{{asset('vendors/pdfmake/build/pdfmake.min.js')}}"></script>
  <script src="{{asset('vendors/pdfmake/build/vfs_fonts.js')}}"></script>
  @yield('scripts')


</body>

</html>