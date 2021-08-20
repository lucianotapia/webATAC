<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Models\Membro;
use App\Models\Colegiado;
use App\Models\TipoVinculo;
use App\Models\Pessoa;
use App\Http\Requests\MembroRequest;

class MembroController extends Controller
{
    public function index(Request $request) 
    {        
        $join = " inner join TipoVinculo on CodTipoVinculo=idTipo ";
        $join .= " inner join " . config("app.replica") . "pessoa p on codpes=NroUsp ";

        if (isset(request()->situacao_id)==false) { request()->situacao_id = 1; }
        
        $where = "";
        if (request()->situacao_id==1) {
            $where = "(getdate() between inicio and fim)";        
        }

        if (isset(request()->colegiado_id)) {
            if ($where!="") { $where .= " and "; }
            $where .= "idColegiado = " . request()->colegiado_id;
        }

        if (isset(request()->nome)) {
            if ($where!="") { $where .= " and "; }
            $where .= "(p.nompes like '%" . request()->nome . "%')";
        }       

        if ($where!="") { $where = " where " . $where; }
        $sql = "select *, DescricaoVinculo, p.nompes nome from membro ";
        $sql .= $join . $where . " order by p.nompes";

        $membros = DB::Select($sql);

        $membros = MembroController::paginate($membros, 15);

        $colegiados = Colegiado::OrderBy("Colegiado")->get();
        
        
        return view('membro.index', ['membros' => $membros, 'colegiados' => $colegiados]);
    }

    public function create()
    {
        $colegiados = Colegiado::OrderBy("Colegiado")->get();
        $tipovinculos = TipoVinculo::OrderBy("CodTipoVinculo")->get();

        return view('membro.create', [
            'membro' => new Membro, 'colegiados' => $colegiados, 'tipovinculos' => $tipovinculos]);
    }

    public function paginate($array, $perPage) {

        if (is_array($array) ) {
            $page = $_GET["page"] ?? 1;
            $offset = ($page * $perPage) - $perPage;
            $paginator = new \Illuminate\Pagination\LengthAwarePaginator(
                array_slice($array, $offset, $perPage, true), count($array), $perPage, $page, ['path' => \Request::url()]
            );
            return $paginator;
        }        
    }

    public function edit($id)
    {
        $membros = Membro::findOrFail($id);
        $colegiados = Colegiado::OrderBy("Colegiado")->get();
        $tipovinculos = TipoVinculo::OrderBy("CodTipoVinculo")->get();
        //$pessoa = Pessoa::findOrFail($membros->NroUsp);

        $sql = "select 1 codpes, ltrim(rtrim(nompes)) nompes, ";
        $sql .= " email=(select top 1 codema from " . config("app.replica") . "emailpessoa e where e.codpes=p.codpes)";
        $sql .= " from " . config("app.replica") . "pessoa p where codpes= ? "; 
        $pessoa = DB::select($sql, [$membros->NroUsp]);

        return view('membro.edit', [ 'membro' => $membros, 'colegiados' => $colegiados, 'tipovinculos' => $tipovinculos, 'pessoa' => $pessoa]);
    }

    public function destroy(Request $request)
    {
        $id_membro = $request["id_membro"];

        $membro = Membro::find($id_membro);
        if ($membro->delete())
            request()->session()->flash('alert-info', 'Registro deletado com sucesso.');
        else
            request()->session()->flash('alert-danger', 'Não foi possível excluir este registro.');

        return redirect("/membro");
    }

    public function update(MembroRequest $request, $id)
    {        
        $validated = $request->validated();

        $membro = Membro::find($id);
        $membro->Inicio = $request->inicio;
        $membro->Fim = $request->fim;
        $membro->idColegiado = $request->colegiado_id;
        $membro->idTipo = $request->vinculo_id;

        $membro->update($validated);
        request()->session()->flash('alert-info', 'Dados do membro atualizado com sucesso.');
        
        return redirect("/membro");
    }

    public function store(MembroRequest $request)
    {
        $validated = $request->validated();
        $membro = new Membro;
        $membro->NroUsp = $request->nusp;
        $membro->Inicio = $request->inicio;
        $membro->Fim = $request->fim;
        $membro->idColegiado = $request->colegiado_id;
        $membro->idTipo = $request->vinculo_id;

        $membro->save($validated);        
        request()->session()->flash('alert-info', 'Membro cadastrado com sucesso.');
        
        return redirect("/membro");
    }
}
