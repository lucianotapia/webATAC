<div class="row">
    <div class="col text-left">
        <input type="hidden" name="url_anterior" class="form-control" value="{{ url()->previous() }} ">
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
    <div class="col-9 text-left">
        <label for="exampleFormControlInput1" class="form-label"><b>Pauta</b></label>
        <input type="file" name="pauta" id="pauta">
    </div>

    <div class="col-3 text-center align-self-end">
        <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
        <a href="/arqs/2883cd36f89eed9a2ca70bce76ee1754.pdf" }}" target="_blank">
            <button class="btn btn-sm btn-outline-warning"><i class="fa fa-cloud-download"></i> Pauta</button>
        </a>

        <a href="/reuniao/anexo/{{ $reuniao->Codigo }}?tipo=pauta">
            <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Excluir</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-9 text-right">
        <label for="exampleFormControlInput1" class="form-label"><b>Ata</b></label>

        @if (file_exists("arqs/0327_Anexos.pdf"))
            <a href="/arqs/0326_Anexos.pdf" target="_blank"><i class="fa fa-cloud-download" aria-hidden="true"></i> Anexos</a>
        @else
            <input type="file" name="ata" class="form-control">
        @endif        

    </div>

    <div class="col-3 text-right align-self-end">
        <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
        <a href="/reuniao/anexo/{{ $reuniao->Codigo }}?tipo=ata">
            <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Excluir</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-10 text-left">
        <label for="exampleFormControlInput1" class="form-label"><b>Anexo</b></label>
        <input type="file" name="anexo0" class="form-control">
    </div>    

    <div class="col-2 text-center align-self-end">
        <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
        <a href="/reuniao/anexo/{{ $reuniao->Codigo }}?tipo=anexo0">
            <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Excluir</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col-10 text-left">
    <label for="exampleFormControlInput1" class="form-label"><b>Complementar 1</b></label>
        <input type="file" name="anexo1" class="form-control">
    </div>

    <div class="col-2 text-center align-self-end">
        <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
        <a href="/reuniao/anexo/{{ $reuniao->Codigo }}?tipo=anexo1">
            <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Excluir</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col text-left">
    <label for="exampleFormControlInput1" class="form-label"><b>Complementar 2</b></label>    
        <input type="file" name="anexo2" class="form-control">
    </div>

    <div class="col-2 text-center align-self-end">
        <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
        <a href="/reuniao/anexo/{{ $reuniao->Codigo }}?tipo=anexo2">
            <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Excluir</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col text-left">
    <label for="exampleFormControlInput1" class="form-label"><b>Complementar 3</b></label>
        <input type="file" name="anexo3" class="form-control">
    </div>

    <div class="col-2 text-center align-self-end">
        <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
        <a href="/reuniao/anexo/{{ $reuniao->Codigo }}?tipo=anexo3">
            <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Excluir</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col text-left">
    <label for="exampleFormControlInput1" class="form-label"><b>Complementar 4</b></label>    s
        <input type="file" name="anexo3" class="form-control">
    </div>

    <div class="col-2 text-center align-self-end">
        <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
        <a href="/reuniao/anexo/{{ $reuniao->Codigo }}?tipo=anexo4">
            <button class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i> Excluir</button>
        </a>
    </div>
</div>

<div class="row">
    <div class="col text-left">
        <label for="exampleFormControlInput1" class="form-label">Observação</label>
        <input type="text" name="observacao" class="form-control" value="{{ old('observacao', $reuniao->Observacao)  }}">
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