<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use Illuminate\Http\UploadedFile;

use App\Models\Reuniao;
use App\Models\Colegiado;
use App\Http\Requests\ReuniaoRequest;

class ReuniaoController extends Controller
{    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request) 
    {        
        //$sql = "select * from Reuniao order by Data";        

        if (isset(request()->colegiado_id)) {
            $reunioes = Reuniao::where('idColegiado', $request->colegiado_id)->OrderBy("Data", "desc")->paginate(15);
        } else {        
            $reunioes = Reuniao::OrderBy("Data", "desc")->paginate(15);
        }

        $colegiados = Colegiado::OrderBy("Colegiado")->get();
        
        return view('reuniao.index', ['reunioes' => $reunioes, 'colegiados' => $colegiados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('reuniao.create', [
            'reuniao' => new Reuniao,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReuniaoRequest $request)
    {
        $validated = $request->validated();

        $reuniao = new Reuniao;

        $minuto = $request->minuto;
        if (strlen($request->minuto)==1)
            $minuto = "0" . $request->minuto;
        
        $datacompleta = $request->data . " " . $request->hora . ":" . $minuto . ":00";

        $reuniao->idColegiado = $request->colegiado_id;
        $reuniao->Titulo = $request->titulo;
        $reuniao->Data = $datacompleta;
        $reuniao->Observacao = $request->observacao;
        $reuniao->save($validated);

        //$request->file('pauta'); or $request->pauta;
        //$request->file('pauta')->isValid();
        //$request->pauta->getClientOriginalName();

        //return dd($request->hasFile('pauta'));
        
        $upload = $reuniao->UploadReuniao($request->Codigo, $request);

        request()->session()->flash('alert-info', 'Reunião cadastrada com sucesso.');
        
        return back()->withInput();; // redirect("/reuniao");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)    
    {
        return view('reuniao.edit', [
            'reuniao' => Reuniao::findOrFail($id)
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ReuniaoRequest $request, $id)
    {
        $validated = $request->validated();

        $reuniao = reuniao::find($id);

        $minuto = $request->minuto;
        if (strlen($request->minuto)==1)
            $minuto = "0" . $request->minuto;

        $datacompleta = $request->data . " " . $request->hora . ":" . $minuto . ":00";
        $reuniao->idColegiado = $request->colegiado_id;
        $reuniao->Titulo = $request->titulo;
        $reuniao->Data = $datacompleta;
        $reuniao->Observacao = $request->observacao;
        $reuniao->update($validated);
        request()->session()->flash('alert-info', 'Dados do reunião atualizado com sucesso.');

        $upload = $reuniao->UploadReuniao($reuniao->Codigo, $request);
        
        return redirect("/reuniao");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id_reuniao = $request["id_reuniao"];

        $reuniao = Reuniao::find($id_reuniao);
        if ($reuniao->delete())
            request()->session()->flash('alert-info', 'Registro deletado com sucesso.');
        else
            request()->session()->flash('alert-danger', 'Não foi possível excluir este registro.');

        return redirect("/reuniao");
    }

    public function convocar($id) {

        $reuniao = Reuniao::findOrFail($id);
        $colegiado = Colegiado::findOrFail($reuniao->IdColegiado);

        return view('reuniao.convocar', [ 'reuniao' => $reuniao, 'colegiado' => $colegiado ]);
    }

    public function deletaAnexo($id) {

        return "ok";
    }
    
}
