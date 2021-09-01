@extends('home')

@section('dados')
    <div class="container mt-5">
        <form method="POST" action="/membro/{{ $membro->CodMembro }}">
            @csrf
            @method('patch')
            <div class="card">
                <div class="card-header text-left">
                    <h4>Editando dados do membro</h4>
                    @include('include.mensagem')
                </div>
            
                <div class="card-body">
                    @include('membro.partials.form')
                </div>    
            </div>
        </form>
    </div>
@endsection