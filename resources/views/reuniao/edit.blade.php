@extends('home')

@section('dados')
    <form method="POST" action="/reuniao/{{ $reuniao->Codigo }}">
        @csrf
        @method('patch')
        <div class="card">
            <div class="card-header text-left">
                <h4>Editando dados da Reunião</h4>
                @include('include.mensagem')
            </div>
        
            <div class="card-body">
                @include('reuniao.partials.form')
            </div>    
        </div>
    </form>
@endsection