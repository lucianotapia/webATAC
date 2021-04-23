@extends('home')

@section('dados')
    <form method="POST" action="/reuniao/{{ $reuniao->Codigo }}">
        @csrf
        @method('patch')
        @include('reuniao.partials.form')
    </form>
@endsection