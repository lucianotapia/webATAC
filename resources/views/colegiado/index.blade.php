@extends('home')

@section('dados')

    @if (!$colegiados->isEmpty())        

        <div class="container">            
            <div>
                <table class="table">
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
                        @foreach($colegiados as $colegiado)
                            @include('colegiado.partials.fields')         
                            <br/>                    
                        @endforeach    
                    </tbody>
                </table>
            </div>
        </div>
    @else
        <h3>Não há reuniões cadastradas!</h3>    
    @endif
    
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