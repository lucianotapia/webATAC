@extends('teste')

@section('dados')
    @if ($reunioes->count() > 0)
        <div class="container mt-5">
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col">Título</th>
                    <th scope="col">Data</th>
                    <th scope="col">Pauta</th>
                    <th scope="col">Ata</th>
                    <th scope="col">Anexo</th>
                    <th scope="col">Complemento</th>
                </tr>
            </thead>
        <tbody>
    @endif
    
    @forelse($reunioes as $reuniao)
        @include('reuniao.partials.fields')
    @empty
        <h3>Não há reuniões cadastradas!</h3>
    @endforelse

    @if ($reunioes->count() > 0)
        </tbody>
        </table>
        <div class="text-center">
            {{ $reunioes->links() }}
        </div>
        </div>
    @endif
    
@endsection




