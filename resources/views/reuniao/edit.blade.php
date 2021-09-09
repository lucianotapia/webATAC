@extends('home')

@section('dados')
    <div class="container mt-5">
        <form method="POST" action="/reuniao/{{ $reuniao->Codigo }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="card">
                <div class="card-header text-left">
                    <h4>Editando dados da Reunião</h4>
                    @include('include.mensagem')
                </div>
            
                <div class="card-body">
                    @include('reuniao.partials.form')
                </div>    
            </div>
        </form>
    </div>


    <!-- Modal para exclusão -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Exclusão de arquivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/reuniao/deletefile" method="post">
                    @csrf                    
                    <div class="modal-body">
                        Confirma a exclusão do arquivo?
                    </div>                
                    <div class="modal-footer">
                        <input type="hidden" name="id_arquivo" id="id_arquivo" value="">
                        <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Não, cancelar</button>
                        <button type="submit" class="btn btn-outline-danger">Sim, excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection