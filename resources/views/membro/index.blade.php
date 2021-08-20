@extends('home')

@section('dados')    
        <div class="container mt-5">
            @include('include.mensagem')
            <div class="card">                
                <div class="card-header text-left">
                    <h5>Cadastro de membros</h5>
                </div>
                <div class="card-body">
                    <form method="get" action="/membro">
                        <div class="row">
                            <div class="col-8 text-left">
                                <label for="exampleFormControlInput1" class="form-label"><b>Colegiado</b></label>
                                <select name="colegiado_id" class="form-select">
                                    @if (request()->colegiado_id=="")
                                        <option value="" selected>Todos os Colegiados</option>
                                    @else
                                        <option value="">Todos os Colegiados</option>
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
        
                            <div class="col-4 text-left">
                                <label for="exampleFormControlInput1" class="form-label"><b>Situação</b></label>
                                <select name="situacao_id" class="form-select">
                                    @if (request()->situacao_id=="1")
                                        <option value="1" selected>Ativos</option>
                                        <option value="0">Todos</option>
                                    @else
                                        <option value="1">Ativos</option>
                                        <option value="0" selected>Todos</option>
                                    @endif
                                </select>
                            </div>
                        </div>
        
                        <div class="row">
                            <div class="col-8 text-left">                    
                                <label for="exampleFormControlInput1" class="form-label"><b>Membro</b> </label>
                                <input type="text" id="nome" name="nome" class="form-control" value="{{ request()->nome }}">
                            </div>
                            <div class="col-3">
                                <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
                                <button type="submit" class="btn btn-outline-info form-control"><i class="fa fa-filter"></i> Filtro </button>
                            </div>
                            <div class="col-1">
                                <label for="exampleFormControlInput1" class="form-label">&nbsp;</label>
                                <button type="button" class="btn btn-outline-info form-control" data-toggle="modal" data-target="#helpModal">?</button>
                            </div>                
                        </div>
                        
                    </form>
                </div>
            </div>

            <!-- Tabela de dados -->
            <table class="table table-bordered">
                <thead>
                    <tr class="table-primary">                    
                        <th scope="col">NUSP</th>
                        <th class="text-left" scope="col">Membro</th>
                        <th scope="col">Início</th>
                        <th scope="col">Fim</th>
                        <th scope="col"></th>
                        <th class="col-sm-3 text-center" scope="col">
                            <a href="/membro/create">
                            <button type="submit" class="btn btn-outline-primary")><i class="fa fa-plus"></i> Novo</button>
                            </a>
                        </th>
                    </tr>
                </thead>
                <tbody>
            
                    @forelse($membros as $membro)
                        @include('membro.partials.fields')
                    @empty
                        <tr><td colspan="7"><h3>Não há membros cadastrados!</h3></td></tr>
                    @endforelse
            
                </tbody>
            </table>
            <div class="text-center">
                {{ $membros->appends(request()->query())->links() }}
            </div>
        </div>

        <!-- Modal do Help -->
        <div class="modal fade" id="helpModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Membros</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>                    
                    <div class="modal-body text-justify">
                        <b>E-Mail</b> esta informação é resgatada do sistema corporativo, para atualização, o respectivo servidor deve logar o sistema USP e alterá-lo,
                        definindo o e-mail como principal.
                    </div>                
                    <div class="modal-footer">                        
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">OK, fechar</button>
                    </div>                    
                </div>
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
                    <form action="/membro/deletar" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="modal-body">
                            Confirma a exclusão do registro?
                        </div>                
                        <div class="modal-footer">
                            <input type="hidden" name="id_membro" id="id_membro" value="">
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
                    modal.find(".modal-footer #id_membro").val(recipientId);
                })
            </script>
        @endsection

@endsection




