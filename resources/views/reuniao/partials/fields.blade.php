<tr>
    <td class="text-left">{{ $reuniao->Titulo ?? '' }}</td>    
    <td>{{ substr( $reuniao->Data, 0,10) }}</td>
    <td>{{ substr( $reuniao->Data, 11,2) . ":" . 
           substr( $reuniao->Data, 14,2) }}</td>
    
    <td></td>
    <td></td>
    <td></td>
    <td></td>

    <td class="text-center">
        <a href="/reuniao/{{ $reuniao->Codigo }}/edit">
            <button class="btn btn-outline-warning"><i class="fa fa-edit"></i> Editar</button>
        </a>
        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-id_col="{{ $reuniao->Codigo }}" data-nome="{{ $reuniao->Titulo }}"><i class="fa fa-trash"></i> Excluir</button>
    </td>   

</tr>        
