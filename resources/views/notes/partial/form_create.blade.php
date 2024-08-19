{{ Form::open(array('route' => 'notes.store')) }}
<div class="mb-3">
    {{Form::label('title', 'Titulo',['class' => 'form-label'])}}
    {{Form::text('title',null,['class' => 'form-control', 'placeholder' => 'Escribe el título de tu nota', 'required'] )}}
</div>
<div class="mb-3">
    {{Form::label('message', 'Mensaje de la nota',['class' => 'form-label'])}}
    {{Form::textArea('message',null, ['class' => 'form-control','placeholder' => 'Escribe el mensaje de tu nota', 'required'])}}
</div>
<div class="d-grid gap-2">
    {{Form::submit('Guardar',['class' => 'btn btn-success'])}}
    <a class="btn btn-light"  href="{{route('notes.index')}}">Cancelar</a>
</div>

{{ Form::close() }}

