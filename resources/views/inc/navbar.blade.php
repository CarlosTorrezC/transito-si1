<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
  <a class="navbar-brand mr-auto" href="/">
    <img src="/storage/app/public/cover_images/LogoAct.png" width="40" height="40" class="d-inline-block align-top" alt="">
    &nbsp;Transito
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav ml-auto">
              @if (Auth::guest())
                <li class="nav-item"><a class="nav-link" href="{{route('login')}}">Iniciar Sesion</a></li> 
              @else
                  <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->username }} <span class="caret"></span>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right" role="menu">
                      
                          <a class="dropdown-item" href="/home">Pagina Principal</a>
                          
                              <a class="dropdown-item" href="{{ route('logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Cerrar Sesion
                              </a>

                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          
                        </div>
                  </li>
              @endif
      </ul>
  </div>
</nav>



<div class="container-fluid">
  <div class="row min-vh-100 flex-column flex-md-row">
    <nav class="navbar navbar-expand navbar-dark bg-dark flex-md-column flex-row align-items-start py-2">
      <div class="position-static">
        <br><br><br>
        <ul class="nav flex-column">

          @if (Auth::guest())
            <li class="nav-item">
              <a class="nav-link text-light" role="button" href="/about">Sobre Nosotros</a>
            </li>
            <li class="nav-item">
            <a class="nav-link text-light" role="button" href="/services">Servicios</a>
            </li>
          @endif

          @if (Gate::check('ciudadano.index') || Gate::check('oficial.index') || Gate::check('users.index'))
            <li class="nav-item dropright">
              <a class="nav-link text-light dropdown-toggle" id="dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrar Personas</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                  @can('ciudadano.index')
                      <a class="dropdown-item" href="{{route('ciudadano.index')}}">Ciudadanos</a>
                  @endcan

                  @can('oficial.index')
                      <a class="dropdown-item" href="{{route('oficial.index')}}">Oficiales</a>
                  @endcan

                  @can('users.index')
                      <a class="dropdown-item" href="{{route('users.index')}}">Usuarios</a>
                  @endcan
              </div>
            </li>
          @endif

          @if (Gate::check('licenciasM.index') || Gate::check('licenciasT.index') || Gate::check('licenciasA.index') || Gate::check('categorias.index'))
            <li class="nav-item dropright">
              <a class="nav-link text-light dropdown-toggle" id="dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrar Licencias</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                  @can('licenciasM.index')
                      <a class="dropdown-item" href="{{route('licenciasM.index')}}">Licencias M</a>
                  @endcan

                  @can('licenciasT.index')
                      <a class="dropdown-item" href="{{route('licenciasT.index')}}">Licencias T</a>
                  @endcan

                  @can('licenciasA.index')
                      <a class="dropdown-item" href="{{route('licenciasA.index')}}">Licencias A</a>
                  @endcan

                  <div class="dropdown-divider"></div>

                  @can('categorias.index')
                      <a class="dropdown-item" href="{{route('categorias.index')}}">Categorias</a>
                  @endcan
              </div>
            </li>
          @endif

          @if (Gate::check('tiposvehiculos.index') || Gate::check('reporte.index') || Gate::check('vehiculo.index') || Gate::check('seguro.index') || Gate::check('marcas.index') || Gate::check('nombre.index'))
            <li class="nav-item dropright">
              <a class="nav-link text-light dropdown-toggle" id="dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrar Vehiculos</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                @can('vehiculo.index')
                    <a class="dropdown-item" href="{{route('vehiculo.index')}}">Vehiculos</a>
                @endcan

                @can('reporte.index')
                    <a class="dropdown-item" href="{{route('reporte.index')}}">Reportes</a>
                @endcan

                @can('seguro.index')
                    <a class="dropdown-item" href="{{route('seguro.index')}}">Seguros</a>
                @endcan

                <div class="dropdown-divider"></div>

                @can('tiposvehiculos.index')
                    <a class="dropdown-item" href="{{route('tiposvehiculos.index')}}">Tipos de Vehiculos</a>
                @endcan

                @can('marcas.index')
                  <a class="dropdown-item" href="{{route('marcas.index')}}">Marca Autos</a>
                @endcan

                @can('nombre.index')
                  <a class="dropdown-item" href="{{route('nombre.index')}}">Nombre Autos</a>
                @endcan
              </div>
            </li>
          @endif

        

          @if (Gate::check('multa.index') || Gate::check('infraccion.index'))
            <li class="nav-item dropright">
              <a class="nav-link text-light dropdown-toggle" id="dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Administrar Multas</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                @can('multa.index')
                    <a class="dropdown-item" href="{{route('multa.index')}}">Multas</a>
                @endcan

                <div class="dropdown-divider"></div>

                @can('titulos.index')
                  <a class="dropdown-item" href="{{route('titulos.index')}}">Titulo del Codigo de Transito</a>
                @endcan

                @can('capitulos.index')
                  <a class="dropdown-item" href="{{route('capitulos.index')}}">Capitulo Codigo de Transito</a>
                @endcan

                @can('infraccion.index')
                  <a class="dropdown-item" href="{{route('infraccion.index')}}">Infracciones</a>
                @endcan
              </div>
            </li>
          @endif

          @if (Gate::check('roles.index') || Gate::check('bitacora.index'))
            <li class="nav-item dropright">
              <a class="nav-link text-light dropdown-toggle" id="dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Configuracion</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                @can('roles.index')
                    <a class="dropdown-item" href="{{route('roles.index')}}">Roles</a>
                @endcan
                @can('bitacora.index')
                    <a class="dropdown-item" href="{{route('bitacora.index')}}">Bitacora</a>
                @endcan
              </div>
            </li>
          @endif


          <?php $user = Auth::id() ?>
              <?php $role = DB::table('role_user')
                          ->where('user_id', $user)
                          ->join('roles', 'role_user.role_id', '=', 'roles.id')
                          ->select('roles.name')->first() ?>


            <li class="nav-item dropright">
              <a class="nav-link text-light dropdown-toggle" id="dropdown01" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Consultas</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">

                  <a class="dropdown-item" href="/vehiculo/consulta">Consultar Vehiculo</a>

                  <div class="dropdown-divider"></div>

                  @can ('pages.consulta')
                    <a class="dropdown-item" href="/consulta">Consultar Licencia</a>
                  @endcan

              </div>
            </li>
           

        </ul>
      </div>
    </nav>