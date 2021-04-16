<tr>    
    <td><a href="/colegiado/{{ $colegiado->CodColegiado }}/edit">Editar</a></td>
    <td>
        <form action="/colegiado/{{ $colegiado->CodColegiado }}" method="post">
            @csrf
            @method('delete')
            <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
        </form>
    </td>

    <td class="text-left">{{ $colegiado->Colegiado ?? '' }}</td>
</tr>