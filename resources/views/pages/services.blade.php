@extends ('layouts.app')

@section ('content')
    <h1>Servicios</h1>
        @if (count($service) > 0)
            <ul>
                @foreach ($service as $ser)
                    <li class="list-group-item">{{$ser}}</li>
                @endforeach
            </ul>
        @endif
        <div class="card-group">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Donde Encontrarnos</h5>
                <hr>
                <p class="card-text"><a href=""></a> 3er Anillo Externo, Av. Santos Dumont</p>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3798.548780759842!2d-63.18430964978805!3d-17.81289118050763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x93f1e8367895c507%3A0x97fa484aee198ec1!2sOrganismo%20Operativo%20de%20Transito%20Santa%20Cruz!5e0!3m2!1ses-419!2sbo!4v1603159416746!5m2!1ses-419!2sbo" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Nuestro Horario</h5>
                <hr>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Lunes       7:00-15:00</li>
                    <li class="list-group-item">Martes      7:00-15:00</li>
                    <li class="list-group-item">Miercoles   7:00-15:00</li>
                    <li class="list-group-item">Jueves      7:00-15:00</li>
                    <li class="list-group-item">Viernes     7:00-15:00</li>
                    <li class="list-group-item">Sabado y Domingo no hay atencion</li>
                </ul>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Nuestros Medios</h5>
                <hr>
                <p class="card-text">Teléfono: 3 3525669</p>
                <p class="card-text"><a href="https://m.facebook.com/profile.php?id=1489453004624651&__tn__=C-R">Encuentranos en Facebook!</a></p>
              </div>
            </div>
          </div>
@endsection