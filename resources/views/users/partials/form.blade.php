<hr>
<h3>Seleccione un Rol</h3>
<div class="form-group">
    <label >
        <ul class="list-unstyled">
            @foreach ($roles as $rol)
                <li>
                    <label>
                        {{Form::checkbox('roles[]', $rol->id, null, ['class' => 'check-list'])}}
                        {{$rol->name}}
                        <em>({{$rol->descriptions ? :'Sin Descripcion'}})</em>
                    </label>
                </li>
            @endforeach
        </ul>
    </label>
</div>
<div class="form-group">
    <a href="{{route('users.index')}}" class="btn btn-secondary">Cancelar</a> 
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
</div>

<script type="text/javascript">
    $('.check-list').on('change', function() {
        $('.check-list').not(this).prop('checked', false);  
    });
</script>
