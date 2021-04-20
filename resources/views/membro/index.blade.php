@extends('teste')

@section('dados')
    @if ($membros->count() > 0)

        <div class="container mt-5">        
        <form method="get" action="/membro">            
            <div class="row">

                <div class="col-sm input-group">
                    <label for="exampleFormControlInput1" class="form-label">Membro: </label>
                    <input type="text" id="nome" name="nome" value="{{ request()->nome }}"> 
                </div>

                <div class="col-sm input-group">
                    <label for="exampleFormControlInput1" class="form-label">Colegiado: </label>
                    <select name="colegiado_id" class="form-select">
                        @if (request()->colegiado_id=="")
                            <option value="" selected>Todos os Colegiados</option>
                        @else
                            <option value="">Todos os Colegiados</option>
                        @endif

                        @foreach($colegiados as $colegiado)
                            @if (request()->colegiado_id==$colegiado->CodColegiado)
                                <option value="{{ $colegiado->CodColegiado }}" selected>{{ $colegiado->Colegiado }}</option>
                            @else
                                <option value="{{ $colegiado->CodColegiado }}">{{ $colegiado->Colegiado }}</option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="col-sm input-group">
                    <label for="exampleFormControlInput1" class="form-label">Situação: </label>
                    <select name="situacao_id" class="form-select">
                        @if (request()->situacao_id=="1")
                            <option value="1" selected>Ativos</option>
                            <option value="0">Todos</option>
                        @else
                            <option value="1">Ativos</option>
                            <option value="0" selected>Todos</option>
                        @endif
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
                    <th scope="col">NUSP</th>
                    <th scope="col">Membro</th>
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




