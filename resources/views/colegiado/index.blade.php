@extends('home')

@section('dados')
    <div class="container mt-5">
        @include('include.mensagem')   
        <div class="card">                
            <div class="card-header text-left">
                <h5>Cadastro de Colegiados/Comissão</h5>
            </div>
            <div class="card-body">
                <form method="get" action="/colegiado">
                    <div class="row">
                        <div class="col-9 text-left">                    
                            <label for="exampleFormControlInput1" class="form-label"><b>Colegiado/Comissão</b> </label>
                            <input type="text" id="nome" name="nome" class="form-control" value="{{ request()->nome }}">
                        </div>
                        <div class="col-3">
                            <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
                            <button type="submit" class="btn btn-outline-info form-control"><i class="fa fa-filter"></i> Filtro </button>
                        </div>                       
                    </div>
                </form>
            </div>
        </div>
        <!-- Tabela de dados -->
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th class="col-sm-9 text-left" scope="col">Colegiado/Comissão</th>
                    <th class="col-sm-3 text-center" scope="col">
                        <a href="/colegiado/create">
                        <button type="submit" class="btn btn-outline-primary")><i class="fa fa-plus"></i> Novo</button>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($colegiados as $colegiado)
                    @include('colegiado.partials.fields')
                @empty
                    <tr><td colspan="2"><h3>Não há reuniões cadastradas!</h3></td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Modal para exclusão -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Exclusão de registro T</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/colegiado/deletar" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        Confirma a exclusão do registro?
                    </div>                
                    <div class="modal-footer">
                        <input type="hidden" name="id_colegiado" id="id_colegiado" value="">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Não, cancelar</button>
                        <button type="submit" class="btn btn-danger">Sim, excluir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @section('javascripts_bottom')
        <script type="text/javascript">
            $("#deleteModal").on("show.bs.modal", function (event) {
                var button = $(event.relatedTarget); 
                var recipientId = button.data("id_col");
                var modal = $(this);                
                modal.find(".modal-body").text("Confirma a exclusão do registro '" + button.data("descricao") + "'?");
                modal.find(".modal-footer #id_colegiado").val(recipientId);
            })
        </script>
    @endsection

@endsection