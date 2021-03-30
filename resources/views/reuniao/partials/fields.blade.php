<tr>
    <th scope="row"><a href="/reuniao/{{ $reuniao->Codigo }}/edit">Editar</a></th>
    <td>
        <form action="/reuniao/{{ $reuniao->Codigo }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza?');">Deletar</button>
        </form>
    </td>
    <td>{{ $reuniao->Titulo ?? '' }}</td>
    <td>{{ $reuniao->Data ?? '' }}</td>
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>        
