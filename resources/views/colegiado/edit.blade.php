@extends('home')

@section('dados')
    <form method="POST" action="/colegiado/{{ $colegiado->CodColegiado }}">
        @csrf
        @method('patch')
        @include('colegiado.partials.form')
    </form>
@endsection