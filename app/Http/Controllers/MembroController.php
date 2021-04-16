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
        $sql = "select *, nome=(select top 1 nompes from replica.esalq.dbo.pessoa where codpes=NroUsp) from membro ";

        $membros = collect(DB::Select($sql));


        

        // if (isset(request()->colegiado_id)) {
        //     $membros = Membro::where('idColegiado', $request->colegiado_id)->OrderBy("Inicio", "desc")->paginate(15);
        // } else {        
        //     $membros = Membro::OrderBy("Inicio", "desc")->paginate(15);
        // }

        $colegiados = Colegiado::OrderBy("Colegiado")->get();
        
        return view('membro.index', ['membros' => $membros, 'colegiados' => $colegiados]);
    }
}
