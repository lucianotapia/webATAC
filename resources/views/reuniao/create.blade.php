@extends('home')

@section('dados')
    <div class="container mt-5">
        <form method="post" action="/reuniao" enctype="multipart/form-data">
            @csrf
            <div class="card">
                <div class="card-header text-left">
                    <h4>Cadastrando nova reunião</h4>
                    @include('include.mensagem')
                </div>
                
                <div class="card-body">
                    @include('reuniao.partials.form')
                </div>
            </div>
        </form>
    </div>
@endsection