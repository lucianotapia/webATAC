

<tr>
    <th scope="row"><a href="/membro/{{ $membro->CodMembro }}/edit">Editar</a></th>
    <td>
        <form action="/membro/{{ $membro->CodMembro }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza?');">Deletar</button>
        </form>
    </td>
    <td class="text-right">{{ $membro->NroUsp ?? '' }}</td>    
    <td class="text-left">{{ $membro->nome ?? '' }}</td>
    <td>{{ date('d/m/Y', strtotime($membro->Inicio)) ?? '' }}</td>
    <td>{{ date('d/m/Y', strtotime($membro->Fim)) ?? '' }}</td>
    <td>{{ $membro->DescricaoVinculo ?? '' }}</td>    
</tr>        
