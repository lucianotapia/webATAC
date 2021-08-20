@extends('home')

@section('dados')
    
    <div class="container mt-5">
        @include('include.mensagem')
        <div class="card">                
            <div class="card-header text-left">
                <h5>Cadastro de reuniões</h5>
            </div>
            <div class="card-body">
                <form method="get" action="/reuniao">
                    <div class="row">
                        <div class="col-10 text-left">                                                      
                            <label for="exampleFormControlInput1" class="form-label"><b>Colegiado</b></label>
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
                        <div class="col-2 text-center">                            
                            <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
                            <button type="submit" class="btn btn-outline-info form-control"><i class="fa fa-filter"></i> Filtro </button>                            
                        </div>                
                        <div class="row">&nbsp</div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Tabela de dados -->
        <table class="table table-bordered">
            <thead>
                <tr class="table-primary">
                    <th scope="col">Título</th>
                    <th scope="col">Data</th>
                    <th scope="col">Hora</th>
                    <th scope="col">Pauta</th>
                    <th scope="col">Ata</th>
                    <th scope="col">Anexo</th>
                    <th scope="col">Complemento</th>
                    <th class="col-sm-3 text-center" scope="col">
                        <a href="/reuniao/create">
                        <button type="submit" class="btn btn-outline-primary")><i class="fa fa-plus"></i> Novo</button>
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>    
            
                @forelse($reunioes as $reuniao)
                    @include('reuniao.partials.fields')
                @empty        
                    <tr><td colspan="7"><h3>Não há reuniões cadastradas!</h3></td></tr>
                @endforelse

            </tbody>
        </table>
        <div class="text-center">
            {{ $reunioes->appends(request()->query())->links() }}
        </div>
    </div>    

    <!-- Modal para exclusão -->
    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Exclusão de registro</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/reuniao/deletar" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        Confirma a exclusão do registro?
                    </div>                
                    <div class="modal-footer">
                        <input type="hidden" name="id_reuniao" id="id_reuniao" value="">
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
                modal.find(".modal-body").text("Confirma a exclusão do registro '" + button.data("nome") + "'?");
                modal.find(".modal-footer #id_reuniao").val(recipientId);
            })
        </script>
    @endsection
    
@endsection




