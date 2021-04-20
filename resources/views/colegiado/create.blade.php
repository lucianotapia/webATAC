@extends('teste')

@section('dados')
    <div class="container mt-5">
        <form method="post" action="/colegiado">
            @csrf
            @include('colegiado.partials.form')
        </form>
    </div>
@endsection