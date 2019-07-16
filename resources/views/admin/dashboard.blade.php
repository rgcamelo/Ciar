@extends('admin.layout')

@section('cuerpo')
    <div class="wrapper">
    
      <!-- Main Header -->
      <header class="main-header">
    
        <!-- Logo -->
        <a href="/" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b></b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>CIARP</b></span>
        </a>
    
        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
              <!-- /.messages-menu -->
    
              <!-- Notifications Menu -->
              <!-- User Account Menu -->
              <li class="dropdown user user-menu">
                <!-- Menu Toggle Button -->
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <!-- The user image in the navbar-->
                  <img src="/admintle/img/user2-160x160.jpg" class="user-image" alt="User Image">
                  <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs">{{ auth()->user()->Nombre() }}</span>
                </a>
                <ul class="dropdown-menu">
                  <!-- The user image in the menu -->
                  <li class="user-header">
                    <img src="/admintle/img/user2-160x160.jpg" class="img-circle" alt="User Image">
    
                    <p>
                      {{ auth()->user()->Nombre() }}
                    </p>
                  </li>
                  <!-- Menu Body -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="#" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                    <form method="POST" action="{{ route('logout') }}">
                        {{ csrf_field() }}
                        <button class="btn btn-danger">Cerrar Sesion</button>
                      </form>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
    
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
    
          <!-- Sidebar user panel (optional) -->
          <div class="user-panel">
            <div style="display: flex;justify-content:center">
              <img style="width:60px;height:60px" src="/admintle/img/upc2.png" alt="User Image">
            </div>
          </div>
 
          <!-- Sidebar Menu -->
          <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Menu</li>
            <!-- Optionally, you can add icons to the links -->
            @if ( auth()->user()->tipo == 'Docente' )
            @if ( isset( auth()->user()->convocatoria()->first()->estado))
            @if ( auth()->user()->convocatoria()->first()->estado == 'Actual')
                 @if ( strtotime(date('Y-m-d')) >= strtotime(auth()->user()->convocatoria()->first()->fecha_inicio) and strtotime(date('Y-m-d')) <= strtotime(auth()->user()->convocatoria()->first()->fecha_final) )
                 <li class="treeview">
                    <a href=""><i class="fa fa-upload"></i> <span>Registrar Productividad</span>
                      <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                      <li><a href="/software">Software</a></li>
                      <li><a href="/libro">Libros</a></li>
                      <li><a href="/articulo">Articulo</a></li>
                      <li><a href="/ponencia">Ponencia</a></li>
                      <li><a href="/video">Cinematografias o Fonografias</a></li>
                      <li><a href="/premiosnacionales">Premios Nacionales</a></li>
                      <li><a href="/patente">Patente</a></li>
                      <li><a href="/traduccion">Traduccion</a></li>
                      <li><a href="/obra">Obras Artisticas</a></li>
                      <li><a href="/produccionTecnica">Produccion Tecnica</a></li>
                      <li><a href="/estudiosPostdoctorales">Estudios PostDoctorales</a></li>
                      <li><a href="/publicacionImpresa">Publicacion Impresa Universitaria</a></li>
                      <li><a href="/reseñasCriticas">Reseñas Criticas</a></li>
                      <li><a href="/direccionTesis">Direccion de Tesis</a></li>
                    </ul>
                  </li>
                 @endif
             @endif
                
            @endif

            <li class="active"><a href="/solicitudes"><i class="fa fa-terminal"></i> <span>Mis Solicitudes</span></a></li>
            <li class="active"><a href="/productividad"><i class="fa fa-book"></i> <span>Productividad</span></a></li>  
            <li class="active"><a href="/reclamos"><i class="fa  fa-commenting"></i> <span>Mis reclamos</span></a></li>  
            @endif
            
            @if ( auth()->user()->tipo == 'Administrador')
            @if ( isset( auth()->user()->convocatoria()->first()->estado))
            <li class="active"><a href="/laconvocatoria"><i class="fa fa-calendar"></i> <span>Convocatoria</span></a></li>
            @else
            <li class="active"><a href="/nuevaconvocatoria"><i class="fa fa-calendar"></i> <span>Convocatoria</span></a></li>
            @endif
            <li class="active"><a href="/revisarsolicitudes"><i class="fa fa-envelope"></i> <span>Solicitudes</span></a></li>
            <li class="active"><a href="/revisarreclamos"><i class="fa fa-commenting"></i> <span>Reclamos</span></a></li>
            <li class="active"><a href="/registros"><i class="fa fa-archive"></i> <span>Registros</span></a></li>

            @endif
          </ul>
          <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
      </aside>
    
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          @yield('cabezera')
        </section>
    
        <!-- Main content -->
        <section id="Principal" class="content container-fluid">
          
              @yield('content')
          
            
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    
      <!-- Main Footer -->
      <footer class="main-footer">
        
      </footer>
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
    
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
    
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
            </ul>
            <!-- /.control-sidebar-menu -->
    
            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript:;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="pull-right-container">
                        <span class="label label-danger pull-right">70%</span>
                      </span>
                  </h4>
    
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul>
            <!-- /.control-sidebar-menu -->
    
          </div>
          <!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
          <!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
    
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
    
                <p>
                  Some information about this general settings option
                </p>
              </div>
              <!-- /.form-group -->
            </form>
          </div>
          <!-- /.tab-pane -->
        </div>
      </aside>
      <!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->
    
    <!-- REQUIRED JS SCRIPTS -->
    
    <!-- jQuery 3 -->
    
    
    <!-- Optionally, you can add Slimscroll and FastClick plugins.
         Both of these plugins are recommended to enhance the
         user experience. -->
@endsection
