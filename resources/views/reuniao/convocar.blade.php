@extends('home')

@section('dados')
    <div class="container mt-5">
        <form method="post" action="/send_email">
            @csrf
            <div class="card">
                <div class="card-header text-left">
                    <h4>Enviar E-Mail de convocação</h4>
                    @include('include.mensagem')
                </div>
                
                <div class="card-body">
                    <form>

                        <div class="mb-2 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label text-left">De</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" id="staticEmail" value="atac-esalq@usp.br">
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label text-left">Para membros</label>
                            <div class="col-sm-6">
                                <input type="text" readonly class="form-control" id="staticEmail" value="{{ $colegiado->Colegiado }}">
                            </div>
                        </div>

                        <div class="mb-2 row">
                            <label for="staticEmail" class="col-sm-2 col-form-label text-left">Assunto</label>
                            <div class="col-sm-8">                                
                                <input type="text" name="titulo" class="form-control" value="{{ $colegiado->Colegiado }} - Convocação e Material ({{ substr($reuniao->Data,0, 16) }})">
                            </div>
                        </div>
                        
                        <div class="row mb-3">
                            <label for="exampleFormControlInput1" class="form-label text-left">Prezado(a) Senhor (a)  "nome do membro"</label>                            
                            <textarea class="form-control text-justify" id="email" rows="10">
                                De ordem do Sr. Diretor, vimos convocá-lo(a) para a reunião ordinária da CTA a ser realizada no próximo dia 09/12/2021, às 14:00h, em sua sala própria.

                                O material para a reunião esta disponível no endereço abaixo:

                                http://wsistemas1.esalq.usp.br:8080/reunioes

                                Atenciosamente,

                                Márcia Maria Silveira
                                Assistente Acadêmica 

                                OBS: esse e-mail é automático. Não é necessário responder.

                                Web Reuniões 
                                Implementado pela Seção Técnica de Informática da ESALQ.
                            
                            </textarea>                            
                        </div>

                        <div class="row text-center mt-3">    
                            <div class="col">
                                <button type="submit" class="btn btn btn-outline-primary"><i class="fa fa-paper-plane"></i> Enviar</button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </form>
    </div>
@endsection