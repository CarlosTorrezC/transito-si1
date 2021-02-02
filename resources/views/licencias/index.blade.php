@extends ('layouts.app')

@section ('content')
<h1>Licencias</h1>
    <div class="container">
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Licencia M</h5>
                  <p class="card-text">Formulario de Licencias de Motocicletas</p>
                  <a href="{{route('licenciasM.index')}}" class="btn btn-primary">Ir al Formulario</a>
                </div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Licencia T</h5>
                  <p class="card-text">Formulario de Licencias de Maquinaria Pesada</p>
                  <a href="{{route('licenciasT.index')}}" class="btn btn-primary">Ir al Formulario</a>
                </div>
              </div>
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-sm-6">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Licencia A</h5>
                  <p class="card-text">Formulario de Licencias de Vehiculos Particulares</p>
                  <a href="{{route('licenciasA.index')}}" class="btn btn-primary">Ir al Formulario</a>
                </div>
              </div>
            </div>
    </div>
@endsection