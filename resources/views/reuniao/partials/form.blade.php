<div class="row">
    <div class="col text-left">
        <label for="exampleFormControlInput1" class="form-label">Título</label>
        <input type="text" name="titulo" class="form-control" value="{{ old('titulo', $reuniao->Titulo)  }}">
    </div>
</div>

<div class="row">
    <div class="col-2 text-left">
        <label for="exampleFormControlInput1" class="form-label">Data</label>
        <input type="text" name="data" id="data" class="data-picker form-control" autocomplete="off"  value="{{ old('data', $reuniao->Data)  }}">
    </div>
    <div class="col-1 text-left">
        <label for="exampleFormControlInput1" class="form-label">Hora</label>        
        <select name="hora" class="form-select text-right">
            @foreach(range(7,19) as $hora)
                
                @if (isset($reuniao->Data))
                    @if (substr( \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $reuniao->Data), 11, 2)==$hora)
                        <option value="{{$hora}}" selected>{{ (strlen($hora)==1) ? ("0". $hora):$hora }}</option>
                    @else
                        <option value="{{$hora}}">{{ (strlen($hora)==1) ? ("0". $hora):$hora }}</option>
                    @endif
                @else
                    <option value="{{$hora}}">{{ (strlen($hora)==1) ? ("0". $hora):$hora }}</option>
                @endif

            @endforeach
        </select>
    </div>
    <div class="col-1 text-left">
        <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
        <select name="minuto" class="form-select">
            @foreach(range(0,59) as $minuto)
                @if (isset($reuniao->Data))
                    @if (substr( \Carbon\Carbon::createFromFormat('d/m/Y H:i:s', $reuniao->Data), 14, 2)==$minuto)
                        <option value="{{ $minuto }}" selected>{{ (strlen($minuto)==1) ? ("0". $minuto):$minuto }}</option>
                    @else
                        <option value="{{ $minuto }}">{{ (strlen($minuto)==1) ? ("0". $minuto):$minuto }}</option>
                    @endif
                @else
                    <option value="{{ $minuto }}">{{ (strlen($minuto)==1) ? ("0". $minuto):$minuto }}</option>
                @endif
            @endforeach
        </select>
    </div>    
</div>

<div class="row">
    <div class="col text-left">
        <label for="exampleFormControlInput1" class="form-label">Colegiado/Comissão</label>
        <select name="colegiado_id" class="form-select">                        
            <option value="" selected>Informe um Colegiado/Comissão</option>
            
            @foreach($reuniao::colegiados() as $colegiado)
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
    <div class="col text-left">
        <label for="exampleFormControlInput1" class="form-label">Observação</label>
        <input type="text" name="observacao" class="form-control" value="{{ old('observacao', $reuniao->observacao)  }}">
    </div>
</div>
        
<div class="row text-center mt-3">    
    <div class="col">
        <button type="submit" class="btn btn-secondary">Enviar</button>
    </div>
</div>    

@section('javascripts_bottom')
    <script type="text/javascript" src="{{ asset('js/reuniao.js') }}"></script>
@endsection