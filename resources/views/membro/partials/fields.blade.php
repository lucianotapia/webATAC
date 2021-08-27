<tr>    
    <td class="text-right">{{ $membro->NroUsp ?? '' }}</td>    
    <td class="text-left">{{ $membro->nome ?? '' }}</td>
    <td>{{ date('d/m/Y', strtotime($membro->Inicio)) ?? '' }}</td>
    <td>{{ date('d/m/Y', strtotime($membro->Fim)) ?? '' }}</td>
    <td>{{ $membro->DescricaoVinculo ?? '' }}</td> 
    <td class="text-center">
        <a href="/membro/{{ $membro->CodMembro }}/edit">
            <button class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i> Editar</button>
        </a>
        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-id_col="{{ $membro->CodMembro }}" data-nome="{{ $membro->nome }}"><i class="fa fa-trash"></i> Excluir</button>
    </td>   
</tr>        
