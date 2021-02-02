<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Document</title>
    </head>

    <body>
        <div class="card">
            <h3 class="card-header">Transito</h3>
            <div class="card-body">
              <h5 class="card-title">Notificacion de Multa</h5>
              <p class="card-text">Multa Nro : {{$mul->id}}</p>
              <p class="card-text">Informarle que fue multado bajo el vehiculo con placa : {{$mul->placa_vehiculo}}</p>
              <p class="card-text">Fecha : {{$mul->fecha_hora}}</p>
              <p class="card-text">Infracciones Cometidas : {{$string}}</p>     
              <p class="card-text">Monto Total (Bs.) : {{$monto}}</p>     
              <p class="card-text">Oficial : {{$nombre}}</p> 
              <p class="card-text">Codigo Oficial : {{$mul->codigo_oficial}}</p> 
              <small>Por favor apersonarse a la central de transito para cualquier consulta o quejas, nos encontramos en 3er Anillo Externo, Av. Santos Dumont, nuestro horario de atencion de Lunes a Viernes a horas de 7:00-15:00 - Telf: 3 3525669</small>
              
            </div>
          </div>
    </body>
</html>