<tr>
    <td class="text-left">{{ $reuniao->Titulo ?? '' }}</td>    
    <td>{{ substr( $reuniao->Data, 0,10) }}</td>
    <td>{{ substr( $reuniao->Data, 11,2) . ":" . 
           substr( $reuniao->Data, 14,2) }}</td>

    <td class="text-center">
        <a href="/reuniao/{{ $reuniao->Codigo }}/edit">
            <button class="btn btn-sm btn-outline-warning"><i class="fa fa-edit"></i> Editar</button>
        </a>
        
        <button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-id_col="{{ $reuniao->Codigo }}" data-nome="{{ $reuniao->Titulo }}"><i class="fa fa-trash"></i> Excluir</button>

        <a href="/convocar-membro/{{ $reuniao->Codigo }}">
            <button class="btn btn-sm btn-outline-success"><i class="fa fa-envelope" aria-hidden="true"></i> Enviar</button>
        </a>
        <!--
        <button class="btn btn-sm btn-outline-success" data-toggle="modal" data-target="#downloadModal"><i class="fa fa-cloud-download" aria-hidden="true"></i> </button>
        -->
    </td>
</tr>        
