<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PessoaController extends Controller
{

    public function index()
    {
        return view('jqbusca');
    }

    public function autocomplete(Request $request)
    {   
        $sql = "select top 10 codpes id, nompes value, codema from " . config("app.replica") . "capi_localizapessoa";
        $sql .= " where sitatl='A' and codundclg=11 and tipvin='Servidor' and codfncetr=0 ";
        $sql .= " and nompes like '%" . $request->get('term'). "%'";
        $sql .= " order by nompes";
        
        $pessoa = DB::Select($sql);

        //dd($request);
        return response()->json($pessoa); 
        //return json_encode($pessoa);
    }

    public function encontrar_pessoa(Request $request)
    {   
        $sql = "select top 10 codpes id, ltrim(rtrim(nompes)) value, codema from " . config("app.replica") . "capi_localizapessoa";
        $sql .= " where sitatl='A' and codundclg=11 and tipvin='Servidor' and codfncetr=0 ";
        $sql .= " and nompes like '%" . $request->get('term'). "%'";
        $sql .= " order by nompes";
        
        $pessoa = DB::Select($sql);
        
        return response()->json($pessoa);         
    }

    public function encontrar_NUSP($id)
    {   
        $sql = "select 1 codpes, ltrim(rtrim(nompes)) nompes, ";
        $sql .= " email=(select top 1 codema from " . config("app.replica") . "emailpessoa e where e.codpes=p.codpes)";
        $sql .= " from " . config("app.replica") . "pessoa p";        
        
        $pessoa = DB::Select($sql);        
        return $sql;
    }
    
}
