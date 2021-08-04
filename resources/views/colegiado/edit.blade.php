@extends('home')

@section('dados')
    <div class="container mt-5">
        <form method="POST" action="/colegiado/{{ $colegiado->CodColegiado }}">
            @csrf
            @method('patch')
            @include('colegiado.partials.form')
        </form>
    </div>
@endsection