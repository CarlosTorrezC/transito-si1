@extends ('layouts.app')

@section ('content')
        <h1 id="title">Vista Licencia T</h1>
        <div class="container">
            <div class="centered">
                <div class="form-group"> 
                    <div class="row">
                        <div class="card bg-light text-white" style="display: grid; position: relative;
                                                            grid-template-columns: 600px 500px; grid-template-rows: 500px 500px;
                                                            padding: 0px 0px; width: 600px; height: 400px;">
                            <img style='width:100%; height:80%' class="card-img rounded" src="/storage/app/public/cover_images/licenciaOriginal.png" alt="Card image">
                            <div class="card-img-overlay">
                                <div id="status" style="display: grid; position: absolute; grid-template-columns: 100px 50px; padding: 245px 487px;">
                                    @if ($licT->estado == 0)
                                        <p class="card-text text-success font-weight-bold" style="font-size:19px;">ACTIVO</p>
                                    @else
                                        <p class="card-text text-danger font-weight-bold" style="font-size:19px;">INACTIVO</p>
                                    @endif
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 100px 50px; padding: 310px 30px;">
                                    <p class="card-text text-dark font-weight-bold">Nro: {{$licT->id}}</p>
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 100px 50px; padding: 13px 462px;">
                                    <p class="card-text text-dark font-weight-bold">Motorista</p>
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 500px 50px; padding: 70px 230px;">
                                    <p class="card-text text-dark font-weight-bold">{{$portador->nombres}}</p>
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 500px 50px; padding: 96px 230px;">
                                    <p class="card-text text-dark font-weight-bold">{{$portador->apellidos}}</p>
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 150px 50px; padding: 150px 230px;">
                                    @if ($licT->lentes == 0)
                                        <p class="card-text text-dark font-weight-bold">FALSO</p>
                                    @else
                                        <p class="card-text text-dark font-weight-bold">VERDADERO</p>
                                    @endif
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 150px 50px; padding: 150px 410px;">
                                    @if ($licT->audifonos == 0)
                                        <p class="card-text text-dark font-weight-bold">FALSO</p>
                                    @else
                                        <p class="card-text text-dark font-weight-bold">VERDADERO</p>
                                    @endif
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 100px 50px; padding: 198px 225px;">
                                    <p class="card-text text-dark font-weight-bold">{{$portador->sexo}}</p>
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 150px 50px; padding: 198px 295px;">
                                    <p class="card-text text-dark font-weight-bold">{{$portador->nacionalidad}}</p>
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 150px 50px; padding: 198px 455px;">
                                    <p class="card-text text-dark font-weight-bold">{{$portador->grupo_sanguineo}}</p>
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 100px 50px; padding: 245px 225px;">
                                    <p class="card-text text-dark font-weight-bold">{{$portador->ci}}</p>
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 100px 50px; padding: 290px 225px;">
                                    <p class="card-text text-dark font-weight-bold">{{$licT->emision}}</p>
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 100px 50px; padding: 290px 350px;">
                                    <p class="card-text text-dark font-weight-bold">{{$licT->vencimiento}}</p>
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 100px 50px; padding: 340px 225px;">
                                    <p class="card-text text-dark font-weight-bold">{{$portador->fecha_nacimiento}}</p>
                                </div>
                                <div style="display: grid; position: absolute; grid-template-columns: 100px 50px; padding: 265px 500px;">
                                    <h1 class="card-text text-info font-weight-bold" style="font-size:100px;">T</h1>
                                </div>


                                <div style="display: grid; position: relative;
                                                grid-template-columns: 190px 100px; grid-template-rows: 310px 310px;
                                                padding: 90px 0px; width: 100px; height: 200px;">
                                    <img style='width:100%; height:68%' class="card-img rounded" src="/storage/app/public/cover_images/{{$licT->cover_image}}" alt="Card image">
                                </div>
                            </div>
                        </div>


                        <div id="buttons" class="card" style="width: 18rem;">
                            <div class="card-body">
                                <div class="row">
                                    <p class="card-text text-dark font-weight-bold" style="font-size:19px;">Estado : </p> 
                                    @if ($licT->estado == 0)
                                        <p class="card-text text-success font-weight-bold" style="font-size:19px;">ACTIVO</p>
                                    @else
                                        <p class="card-text text-danger font-weight-bold" style="font-size:19px;">INACTIVO</p>
                                    @endif
                                </div>
                                <button id="print" class="float-right btn-primary" onclick="printpage()">Imprimir Licencia</button>
                                <a href="{{route('licenciasT.index')}}" class="btn btn-secondary">Atras</a> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
@endsection

@section('scripts')
    <script>
        function printpage() {
            //Get the print button and put it into a variable
            var title = document.getElementById("title");
            var status = document.getElementById("status");
            var buttons = document.getElementById("buttons");

            //Set the button visibility to 'hidden' 
            title.style.visibility = 'hidden';
            status.style.visibility = 'hidden';
            buttons.style.visibility = 'hidden';

            //Print the page content
            window.print()

            //Restore button visibility
            title.style.visibility = 'visible';
            status.style.visibility = 'visible';
            buttons.style.visibility = 'visible';
        }
    </script>
@endsection