<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;


use App\Models\Membro;
use App\Models\Colegiado;

class MembroController extends Controller
{
    public function index(Request $request)
    {        
        $join = " inner join TipoVinculo on CodTipoVinculo=idTipo ";

        if (isset(request()->situacao_id)==false) { request()->situacao_id = 1; }
        
        $where = "";
        if (request()->situacao_id==1) {
            $where = "(getdate() between inicio and fim)";        
        }

        if (isset(request()->colegiado_id)) {
            if ($where!="") { $where .= " and "; }
            $where .= "idColegiado = " . request()->colegiado_id;
        }        

        if ($where!="") { $where = " where " . $where; }
        $sql = "select *, DescricaoVinculo, ";
        $sql .= " nome=(select top 1 nompes from pessoa where codpes=NroUsp) from membro ";
        $sql .= $join . $where . " order by nome";

        $membros = DB::Select($sql);

        $membros = MembroController::paginate($membros, 15);

        $colegiados = Colegiado::OrderBy("Colegiado")->get();        
        
        return view('membro.index', ['membros' => $membros, 'colegiados' => $colegiados]);
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
}
