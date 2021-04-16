@extends('teste')

@section('dados')
    @if ($membros->count() > 0)
        <div class="container mt-5">
        <form method="get" action="/membro">
            <div class="row">
                <div class="col-sm input-group">
                    <label for="exampleFormControlInput1" class="form-label">Colegiado: </label>
                    <select name="colegiado_id" class="form-select">
                        <option value="" selected>Selecione o Colegiado para filtro</option>
                        @foreach($colegiados as $colegiado)                              
                            <option value="{{ $colegiado->CodColegiado }}">{{ $colegiado->Colegiado }}</option>                            
                        @endforeach
                    </select>
                </div>

                <div class="col-sm input-group">
                    <label for="exampleFormControlInput1" class="form-label">Situação: </label>
                    <select name="situacao_id" class="form-select">
                        <option value="1" selected>Ativos</option>
                        <option value="0">Todos</option>                        
                    </select>
                </div>
                <div>
                    <span class="input-group-btn">
                        <button type="submit" class="btn btn-success"> Buscar </button>
                    </span>
                </div>
            </div>
            <div class="row">&nbsp</div>

        </form>
        
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col">#</th>
                    <th scope="col"></th>
                    <th scope="col">Título</th>
                    <th scope="col">Data</th>
                    <th scope="col">Início</th>
                    <th scope="col">Fim</th>
                    <th scope="col"></th>
                </tr>
            </thead>
        <tbody>
    @endif
    
    @forelse($membros as $membro)
        @include('membro.partials.fields')
    @empty
        <h3>Não há membros cadastradas!</h3>
    @endforelse

    @if ($membros->count() > 0)
        </tbody>
        </table>
        <div class="text-center">
            {{ $membros->appends(request()->query())->links() }}
        </div>
        </div>
    @endif    
    
@endsection




