@include('layout.header')
@section('title', 'Notas Crear')
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card">

        <div class="card-body">
            <h5 class="card-title">Crear Nota</h5>
         @include('notes.partial.form_create')
        </div>
    </div>
</div>

@include('layout.footer')
