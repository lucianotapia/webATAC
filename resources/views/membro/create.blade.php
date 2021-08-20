@extends('home')

@section('dados')
    <div class="container mt-5">
        <form method="post" action="/membro">
            @csrf
            @include('membro.partials.form')
        </form>
    </div>
@endsection