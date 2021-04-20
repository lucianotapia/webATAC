<div class="card">
    <div class="card-header">
        <h4>Cadastro de Colegiado/Comissão</h4>
    </div>
    
    <div class="card-body">
        <div class="row">
            <div class="col">
                <label for="exampleFormControlInput1" class="form-label">Colegiado</label>
                <input type="text" name="colegiado" class="form-control" value="{{ old('colegiado', $colegiado->Colegiado)  }}">
            </div>            
        </div>
        
        <div class="row text-center mt-3">    
            <div class="col">
                <button type="submit" class="btn btn-secondary">Enviar</button>
            </div>
        </div>
    </div>    
</div>