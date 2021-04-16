<tr>
    <th scope="row"><a href="/membro/{{ $membro->CodMembro }}/edit">Editar</a></th>
    <td>
        <form action="/membro/{{ $membro->CodMembro }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza?');">Deletar</button>
        </form>
    </td>
    <td class="text-left">{{ $membro->NroUsp ?? '' }}</td>    
    <td>{{ $membro->nome ?? '' }}</td>
    <td>{{ date('d/m/Y H:i:s', strtotime($membro->Inicio)) ?? '' }}</td>
    <td></td>
    <td></td>
    <td></td>
</tr>        
