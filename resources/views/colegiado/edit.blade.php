@extends('home')

@section('dados')
    <div class="container mt-5">
        <form method="POST" action="/colegiado/{{ $colegiado->CodColegiado }}">
            @csrf
            @method('patch')
            <div class="card">
                <div class="card-header text-left">
                    <h4>Editando dados do Colegiado/Comissão</h4>
                    @include('include.mensagem')
                </div>
            
                <div class="card-body">
                    @include('colegiado.partials.form')
                </div>    
            </div>
        </form>
    </div>
@endsection