@include('layout.header')
<div class=" mt-5 mx-5">
    <div class="d-flex justify-content-end mb-4">
        <a class="btn btn-success" href="{{route('notes.create')}}">Crear nota</a>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Título</th>
                    <th scope="col">Mensaje</th>
                    <th scope="col">Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach($notes as $note)
                    <tr>
                        <th>{{$note->id}}</th>
                        <td>{{$note->title}}</td>
                        <td>{{$note->message}}</td>
                        <td>
                            {{ Form::open(array('route' => ['notes.delete', $note->id], 'method' => 'DELETE',   'id' => 'formDeleted' . $note->id)) }}
                            {{ Form::close() }}
                            <a class="btn btn-info"  href="{{route('notes.edit',$note->id)}}" data-bs-toggle="tooltip" data-bs-title="Editar nota"><i class="fa-solid fa-pen-to-square"></i></a>
                            <button class="btn btn-danger"  data-bs-toggle="tooltip" data-bs-title="Eliminar nota nota" onclick="alert_deleted({{$note->id}})"><i class="fa-solid fa-trash"></i></button>

                        </td>
                    </tr>


                @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
@section('js')
    <script>
        const title ='¿Estas Seguro?'
        const text = 'de eliminar ésta nota'
    </script>

    {!! Html::script('assets/js/alert_deleted.js') !!}
@endsection
@include('layout.footer')
