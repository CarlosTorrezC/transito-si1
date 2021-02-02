@extends ('layouts.app')

@section ('content')
<h1>Otros</h1>
    <div class="container">
          <div class="row">
            @can('tiposvehiculos.index')
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Tipos de Vehículos</h5>
                    <p class="card-text">Formulario de tipos de vehículares</p>
                        <a href="{{route('tiposvehiculos.index')}}" class="btn btn-primary">Ir al Formulario</a>
                  </div>
                </div>
              </div>
            @endcan
            @can('categorias.index')
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Categorias de Licencia A</h5>
                    <p class="card-text">Formulario de Categorias de Licencia A</p>
                    <a href="{{route('categorias.index')}}" class="btn btn-primary">Ir al Formulario</a>
                  </div>
                </div>
              </div>
            @endcan
          </div>
          <br>
          <div class="row">
            @can('categorias.index')
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Roles</h5>
                    <p class="card-text">Formulario de Cargos</p>
                    <a href="{{route('roles.index')}}" class="btn btn-primary">Ir al Formulario</a>
                  </div>
                </div>
              </div>
            @endcan
            @can('infraccion.index')
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Infracciones</h5>
                    <p class="card-text">Formulario de Infracciones</p>
                    <a href="{{route('infraccion.index')}}" class="btn btn-primary">Ir al Formulario</a>
                  </div>
                </div>
              </div>
            @endcan
          </div>
          <br>
          <div class="row">
            @can('bitacora.index')
              <div class="col-sm-6">
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Bitacora</h5>
                    <p class="card-text">Visualizacion de Bitacora</p>
                    <a href="{{route('bitacora.index')}}" class="btn btn-primary">Ir</a>
                  </div>
                </div>
              </div>
            @endcan
          </div>
    </div>

@endsection