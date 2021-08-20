<tr>
    <td class="col-sm-9 text-left">{{ $colegiado->Colegiado ?? '' }}</td>
    
    <td class="text-center">
        <a href="/colegiado/{{ $colegiado->CodColegiado }}/edit">
            <button class="btn btn-outline-warning"><i class="fa fa-edit"></i> Editar</button>
        </a>
        <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#deleteModal" data-id_col="{{ $colegiado->CodColegiado }}" data-descricao="{{ $colegiado->Colegiado }}"><i class="fa fa-trash"></i> Excluir</button>
    </td>
</tr>

