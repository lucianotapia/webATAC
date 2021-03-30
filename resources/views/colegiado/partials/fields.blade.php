Entrou no Partials
<li> {{ $colegiado->colegiado ?? '' }}</li>
<li><a href="/colegiado/{{ $colegiado->CodColegiado }}/edit">Editar</a></li>
<li>
    <form action="/colegiado/{{ $colegiado->CodColegiado }}" method="post">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Tem certeza?');">Apagar</button>
    </form>
</li>