@extends('home')

@section('dados')
    <div class="container mt-5">
        <form method="POST" action="/membro/{{ $membro->CodMembro }}">
            @csrf
            @method('patch')
            @include('membro.partials.form')
        </form>
    </div>
@endsection