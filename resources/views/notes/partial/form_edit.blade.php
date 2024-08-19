{{ Form::open(array('route' => ['notes.update', $note->id], 'method' => 'PUT')) }}
<div class="mb-3">
    {{Form::label('title', 'Titulo',['class' => 'form-label'])}}
    {{Form::text('title',$note->title,['class' => 'form-control', 'placeholder' => 'Escribe el título de tu nota', 'required'] )}}
</div>
<div class="mb-3">
    {{Form::label('message', 'Mensaje de la nota',['class' => 'form-label'])}}
    {{Form::textArea('message',$note->message, ['class' => 'form-control','placeholder' => 'Escribe el mensaje de tu nota', 'required'])}}
</div>
<div class="d-grid gap-2">
    {{Form::submit('Actualizar',['class' => 'btn btn-success'])}}
    <a class="btn btn-light"  href="{{route('notes.index')}}">Cancelar</a>
</div>

{{ Form::close() }}
