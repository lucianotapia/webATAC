@extends('teste')

@section('dados')    
    <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col"></th>                    
                    <th scope="col">Colegiado</th>                    
                </tr>
            </thead>
        <tbody>
            @forelse($colegiados as $colegiado)
                @include('colegiado.partials.fields')         
                <br/>
            @empty
                <h3>Não há reuniões cadastradas!</h3>
            @endforelse    
        </tbody>
        </table>
@endsection

