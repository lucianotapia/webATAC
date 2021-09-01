
        <div class="row">
            <div class="col-10 text-left">
                <input type="hidden" name="url_anterior" class="form-control" value="{{ url()->previous() }} ">
                <label for="exampleFormControlInput1" class="form-label"><b>Procurar membro</b></label>
                <input type="text" name="search_titular"id="search_titular" class="form-control" value="" placeholder="Informe no mínimo 4 letras">
            </div>
            <div class="col-2">
                <label for="exampleFormControlInput1" class="form-label">N. USP</label>
                <input type="text" name="nusp" id="nusp" class="form-control" value="{{ old('nusp', $membro->NroUsp)  }}" readonly>
            </div>
        </div>

        <div class="row">            
            <div class="col-7 text-left">
                <label for="exampleFormControlInput1" class="form-label">Membro</label>
                <input type="text" name="membro" id="membro" class="form-control" value="{{ old('membro', $pessoa[0]->nompes ?? '') }}" readonly>
            </div>
            <div class="col-5 text-left">
                <label for="exampleFormControlInput1" class="form-label">E-Mail</label>
                <input type="text" name="email" id="email" class="form-control" value="{{ old('email', $pessoa[0]->email ?? '')  }}" readonly>
            </div>
        </div>

        <div class="row">
            <div class="col-4 text-left">
                <label for="exampleFormControlInput1" class="form-label">Período</label>                
                <input type="text" name="inicio" id="inicio" class="data-picker form-control" autocomplete="off"  value="{{ old('inicio', $membro->Inicio)  }}">
            </div>

            <div class="col-4">
                <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
                <input type="text" name="fim" id="fim" class="data-picker form-control" autocomplete="off"  value="{{ old('fim',  $membro->Fim)  }}">
            </div>
        </div>

        <div class="row">
            <div class="col-8 text-left"">
                <label for="exampleFormControlInput1" class="form-label">Colegiado/Comissão</label>
                <select name="colegiado_id" class="form-select">
                    <option value="" selected>Informe um Colegiado/Comissão</option>                        

                    @foreach($colegiados as $colegiado)
                        @if( old('colegiado_id') == '')
                            <option value="{{$colegiado->CodColegiado}}" {{ $membro->IdColegiado==$colegiado->CodColegiado ? 'selected':'' }}>
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

            <div class="col-4 text-left">                
                <label for="exampleFormControlInput1" class="form-label">Vinculo</label>                
                <select name="vinculo_id" class="form-select">
                    <option value="" selected>Selecione o vinculo</option>
                    @foreach($tipovinculos as $vinculo)
                        @if( old('vinculo_id') == '')
                            <option value="{{$vinculo->CodTipoVinculo}}" {{ $membro->IdTipo==$vinculo->CodTipoVinculo ? 'selected':'' }}>
                                {{ $vinculo->DescricaoVinculo }}
                            </option>
                        @else
                            <option value="{{$vinculo->CodTipoVinculo}}" {{ (old('vinculo_id')==$vinculo->CodTipoVinculo) ? 'selected':'' }}>
                                {{ $vinculo->DescricaoVinculo }}
                            </option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        
        <div class="row text-center mt-3">    
            <div class="col">
                <button type="submit" class="btn btn-secondary">Enviar</button>
            </div>
        </div>


@section('javascripts_bottom')
    <script type="text/javascript" src="{{ asset('js/membro.js') }}"></script>
@endsection