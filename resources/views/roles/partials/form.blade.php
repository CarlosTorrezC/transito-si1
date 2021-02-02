<div class="form-group">
    {{ Form::label('name', 'Nombre del Rol') }}
    {{ Form::text('name', null, ['class' => 'form-contpermission', 'autocomplete' => 'off']) }}
</div>
<div class="form-group">
    {{ Form::label('slug', 'Slug') }}
    {{ Form::text('slug', null, ['class' => 'form-contpermission', 'autocomplete' => 'off']) }}
</div>
<div class="form-group">
    {{ Form::label('description', 'Description') }}
    {{ Form::text('description', null, ['class' => 'form-contpermission', 'autocomplete' => 'off']) }}
</div>

<!-- Button trigger modal -->
<button type="button" class="btn btn-info btn-block" data-toggle="modal" data-target="#exampleModal">
    Seleccionar Permisos
</button>

<hr>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Lista de Permisos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                <ul class="list-unstyled">
                    @foreach ($permissions as $permission)
                        <li>
                            <label>
                                {{ Form::checkbox('permissions[]', $permission->id, null) }}
                                &nbsp;{{$permission->name}}
                                <em>({{$permission->description ?: 'N/A'}})</em>
                            </label>
                        </li>
                        <hr>
                    @endforeach
                </ul>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Afirmar</button>
            </div>
        </div>
    </div>
</div>
<br>
<div class="form-group">
    <a href="{{route('roles.index')}}" class="btn btn-secondary">Atras</a> 
    {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
</div>