<div class="row">
    <div class="col text-left">
        <input type="hidden" name="url_anterior" class="form-control" value="{{ url()->previous() }} ">
        <label for="exampleFormControlInput1" class="form-label">Colegiado</label>
        <input type="text" name="colegiado" class="form-control" value="{{ old('colegiado', $colegiado->Colegiado)  }}">
    </div>            
</div>

<div class="row text-center mt-3">    
    <div class="col">
        <button type="submit" class="btn btn-secondary">Enviar</button>
    </div>
</div>