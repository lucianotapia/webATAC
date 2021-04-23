@extends('home')

@section('dados')
    @if ($reunioes->count() > 0)
        <div class="container mt-5">
        <form method="get" action="/reuniao">
            <div class="row">
                <div class="col-sm input-group">
                    <label for="exampleFormControlInput1" class="form-label">Colegiado: </label>
                    <select name="colegiado_id" class="form-select">
                        @if (request()->colegiado_id=="")
                            <option value="" selected>Todas as reuniões</option>
                        @else
                            <option value="">Todas as reuniões</option>
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
            {{ $reunioes->appends(request()->query())->links() }}
        </div>
        </div>
    @endif    
    
@endsection




