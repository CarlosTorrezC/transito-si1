@extends ('layouts.app')

@section ('content')

<div class="container">
    <div class="card">
      <div class="card-header text-info">
         <button id="print" class="float-right btn-primary" onclick="printpage()">Imprimir Consulta</button>
        Datos Portador
      </div>
      <div class="card-body">
                <div class="row">
                    <p class="text-dark font-weight-bold">Nombre Completo : </p>
                    <p class="text-dark">&nbsp;{{$pers->apellidos}}, {{$pers->nombres}}</p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="text-dark font-weight-bold">Fecha de Nacimiento : </p>
                    <p class="text-dark">&nbsp;{{$pers->fecha_nacimiento}}</p>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="text-dark font-weight-bold">Sexo : </p>
                    <p class="text-dark">&nbsp;{{$pers->sexo}}</p>
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <p class="text-dark font-weight-bold">Nacionalidad : </p>
                    <p class="text-dark">&nbsp;{{$pers->nacionalidad}}</p>
                </div>
      </div>
    </div>
    <br>
    <div class="row">
        <div class="card-deck">
            <div class="card" style="width: 25rem;">
                <div class="card-header">
                    Licencia A
                </div>
                <div class="card-body">
                    @if (is_null($licA))
                        <h5 class="card-title text-danger">No tiene Licencia A</h5>
                    @else
                        @if($licA->estado == true)
                            <h5 class="card-title text-danger">Licencia A Inactivo</h5>
                        @else
                            <h5 class="card-title">Datos Licencia A</h5>
                            <p class="card-text">Nro Licencia : {{$licA->id}}</p>
                            <p class="card-text">Emision : {{$licA->emision}}</p>
                            <p class="card-text">Vencimiento : {{$licA->vencimiento}}</p>
                            <p class="card-text">Grupo Sanguineo : {{$pers->grupo_sanguineo}}</p>
                            @if ($licA->lentes == 0)
                                <p class="card-text">Lentes : FALSO</p>
                            @else
                                <p class="card-text">Lentes : VERDADERO</p>
                            @endif
                            @if ($licA->audifonos == 0)
                                <p class="card-text">Audifonos : FALSO</p>
                            @else
                                <p class="card-text">Audifonos : VERDADERO</p>
                            @endif
                            <p class="card-text">Categoria : {{$licA->categoria_licencia}}</p>
                        @endif
                    @endif
                </div>
                @if (!is_null($licA) && !$licA->estado == true)
                    <img style='width:100%;' src="/storage/app/public/cover_images/{{$licA->cover_image}}" class="card-img-bottom">
                @endif
            </div>
            <div class="card" style="width: 25rem;">
                <div class="card-header">
                    Licencia M
                </div>
                <div class="card-body">
                    @if (is_null($licM))
                        <h5 class="card-title text-danger">No tiene Licencia M</h5>
                    @else
                        @if($licM->estado == true)
                            <h5 class="card-title text-danger">Licencia M Inactivo</h5>
                        @else
                            <h5 class="card-title">Datos Licencia M</h5>
                            <p class="card-text">Nro Licencia : {{$licM->id}}</p>
                            <p class="card-text">Emision : {{$licM->emision}}</p>
                            <p class="card-text">Vencimiento : {{$licM->vencimiento}}</p>
                            <p class="card-text">Grupo Sanguineo : {{$pers->grupo_sanguineo}}</p>
                            @if ($licM->lentes == 0)
                                <p class="card-text">Lentes : FALSO</p>
                            @else
                                <p class="card-text">Lentes : VERDADERO</p>
                            @endif
                            @if ($licM->audifonos == 0)
                                <p class="card-text">Audifonos : FALSO</p>
                            @else
                                <p class="card-text">Audifonos : VERDADERO</p>
                            @endif
                        @endif
                    @endif
                </div>
                @if (!is_null($licM) && !$licM->estado == true)
                    <img style='width:100%;' src="/storage/app/public/cover_images/{{$licM->cover_image}}" class="card-img-bottom">
                @endif
            </div>
            <div class="card" style="width: 25rem;">
                <div class="card-header">
                    Licencia T
                </div>
                <div class="card-body">
                    @if (is_null($licT))
                        <h5 class="card-title text-danger">No tiene Licencia T</h5>
                    @else
                        @if($licT->estado == true)
                            <h5 class="card-title text-danger">Licencia T Inactivo</h5>
                        @else
                            <h5 class="card-title">Datos Licencia T</h5>
                            <p class="card-text">Nro Licencia : {{$licT->id}}</p>
                            <p class="card-text">Emision : {{$licT->emision}}</p>
                            <p class="card-text">Vencimiento : {{$licT->vencimiento}}</p>
                            <p class="card-text">Grupo Sanguineo : {{$pers->grupo_sanguineo}}</p>
                            @if ($licT->lentes == 0)
                                <p class="card-text">Lentes : FALSO</p>
                            @else
                                <p class="card-text">Lentes : VERDADERO</p>
                            @endif
                            @if ($licT->audifonos == 0)
                                <p class="card-text">Audifonos : FALSO</p>
                            @else
                                <p class="card-text">Audifonos : VERDADERO</p>
                            @endif
                        @endif
                    @endif
                </div>
                @if (!is_null($licT) && !$licT->estado == true)
                    <img style='width:100%;' src="/storage/app/public/cover_images/{{$licT->cover_image}}" class="card-img-bottom">
                @endif
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
         function printpage() {
            //Get the print button and put it into a variable
            var print = document.getElementById("print");

            //Set the button visibility to 'hidden' 
            print.style.visibility = 'hidden';

            //Print the page content
            window.print()

            //Restore button visibility
            print.style.visibility = 'visible';
        }
      </script>
@endsection