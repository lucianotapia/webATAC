<div class="card">
    <div class="card-header">
        <h4>Cadastro de Reuniões</h4>
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Título</label>
                <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $reuniao->Titulo)  }}">
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Data</label>
                <input type="text" name="data" id="data" class="data-picker form-control" autocomplete="off"  value="{{ old('data', $reuniao->Data)  }}">
            </div>
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Hora</label>
                <select name="hora">                    
                    @foreach(range(7,19) as $hora)
                        <option value="{{$hora}}">{{ (strlen($hora)==1) ? ("0". $hora):$hora }}</option>
                    @endforeach
                </select>:
                <select name="minuto">                    
                    @foreach(range(0,59) as $minuto)
                        <option value="{{ $minuto }}">{{ (strlen($minuto)==1) ? ("0". $minuto):$minuto }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col">
                
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Colegiado/Comissão</label>
                <select name="colegiado_id" class="form-select">                        
                    <option value="" selected>Informe um Colegiado/Comissão</option>                        

                    @foreach($colegiados as $colegiado)
                        @if( old('colegiado_id') == '')
                            <option value="{{$colegiado->CodColegiado}}" {{ $reuniao->IdColegiado==$colegiado->CodColegiado ? 'selected':'' }}>
                            {{ $colegiado->Colegiado }}
                            </option>
                        @else
                            <option value="{{$colegiado->CodColegiado}}" {{ (old('colegiado_id')==$colegiado->CodColegiado) ? 'selected':'' }}>
                            {{ $colegiado->Colegiado }}
                            </option>
                        
                        @endif
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Observação</label>
                <input type="text" name="observacao" class="form-control" value="{{ old('observacao', $reuniao->observacao)  }}">
            </div>
        </div>
        
        <div class="row text-center mt-3">    
            <div class="col">
                <button type="submit" class="btn btn-secondary">Enviar</button>
            </div>
        </div>
    </div>    
</div>

@section('javascripts_bottom')
    <script type="text/javascript" src="{{ asset('js/reuniao.js') }}"></script>
@endsection