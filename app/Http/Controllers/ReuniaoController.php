<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
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

        $files = array("pauta" => "0", "ata" => "0", "anexo0" => "0", "anexo1" => "0", "anexo2" => "0", "anexo3" => "0", "anexo4" => "0");

        return view('reuniao.create', [
            'reuniao' => new Reuniao, 'files' => $files
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

        if ($request->hasFile('pauta')) {
            $pautaarq = md5($reuniao->Codigo . 'pauta') . "." . $request->file('pauta')->extension();
            $retorno = $request->file('pauta')->storeAs('/pdfs', $pautaarq);            
        }
        

        //$request->file('pauta'); or $request->pauta;
        //$request->file('pauta')->isValid();
        //$request->pauta->getClientOriginalName();        

        request()->session()->flash('alert-info', 'Reunião cadastrada com sucesso.');
        
        return redirect("/reuniao/create");
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
        $files = array("pauta" => "0", "ata" => "0", "anexo0" => "0", "anexo1" => "0", "anexo2" => "0", "anexo3" => "0", "anexo4" => "0");

        // Verifica se o arquivo de Pauta existe
        $nomearq = md5($id . "pauta") . ".pdf";
        if (Storage::exists("pdfs/" . $nomearq))
            $files['pauta'] = '1';

        return view('reuniao.edit', [ 'reuniao' => Reuniao::findOrFail($id), 'files' => $files ]);
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

        if ($request->hasFile('pauta')) {
            $pautaarq = md5($reuniao->Codigo . 'pauta') . "." . $request->file('pauta')->extension();
            $retorno = $request->file('pauta')->storeAs('/pdfs', $pautaarq);            
        }

        if ($request->hasFile('ata')) {
            $arquivo = md5($reuniao->Codigo . 'ata') . "." . $request->file('ata')->extension();
            $retorno = $request->file('ata')->storeAs('/pdfs', $arquivo);            
        }

        if ($request->hasFile('anexo0')) {
            $arquivo = md5($reuniao->Codigo . 'anexo0') . "." . $request->file('anexo0')->extension();
            $retorno = $request->file('anexo0')->storeAs('/pdfs', $arquivo);            
        }

        if ($request->hasFile('anexo1')) {
            $arquivo = md5($reuniao->Codigo . 'anexo1') . "." . $request->file('anexo1')->extension();
            $retorno = $request->file('anexo1')->storeAs('/pdfs', $arquivo);            
        }

        if ($request->hasFile('anexo2')) {
            $arquivo = md5($reuniao->Codigo . 'anexo2') . "." . $request->file('anexo2')->extension();
            $retorno = $request->file('anexo2')->storeAs('/pdfs', $arquivo);            
        }

        if ($request->hasFile('anexo3')) {
            $arquivo = md5($reuniao->Codigo . 'anexo3') . "." . $request->file('anexo3')->extension();
            $retorno = $request->file('anexo3')->storeAs('/pdfs', $arquivo);            
        }

        if ($request->hasFile('anexo4')) {
            $arquivo = md5($reuniao->Codigo . 'anexo4') . "." . $request->file('anexo4')->extension();
            $retorno = $request->file('anexo4')->storeAs('/pdfs', $arquivo);            
        }

        $reuniao->update($validated);
        request()->session()->flash('alert-info', 'Dados do reunião atualizado com sucesso.');

        // $upload = $reuniao->UploadReuniao($reuniao->Codigo, $request);
        
        return redirect($request->url_anterior);
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

        return back();
    }

    public function convocar($id) {

        $reuniao = Reuniao::findOrFail($id);
        $colegiado = Colegiado::findOrFail($reuniao->IdColegiado);

        return view('reuniao.convocar', [ 'reuniao' => $reuniao, 'colegiado' => $colegiado ]);
    }

    public function download($file) {        
        return Storage::Download('pdfs/' . $file);
    }

    public function deletaArquivo(Request $request) {

        $file = $request['id_arquivo'];

        $file = "pdfs/" . $file;
        
        if (Storage::delete([$file])==1)
            request()->session()->flash('alert-info', 'Arquivo deletado com sucesso.');
        else
            request()->session()->flash('alert-info', 'O arquivo NÃO pode ser deletado.');
            
        return back();
    }    
}
