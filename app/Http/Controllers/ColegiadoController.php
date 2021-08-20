<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Colegiado;
use App\Models\Reuniao;
use App\Http\Requests\ColegiadoRequest;


class ColegiadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {        
        // $colegiados = Colegiado::OrderBy('Colegiado')->with('reuniao')->get();
        $procura = '%' . request()->nome . '%'; 
        if (isset(request()->nome)) {
            $colegiados = Colegiado::where('colegiado', 'like', $procura )->OrderBy('Colegiado')->get();            
        }
        else
            $colegiados = Colegiado::OrderBy('Colegiado')->get();

        return view('colegiado.index', ['colegiados' => $colegiados]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('colegiado.create', [
            'colegiado' => new Colegiado,
        ]);        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ColegiadoRequest $request)    
    {
        $validated = $request->validated();
        $colegiado = new Colegiado;
        $colegiado->colegiado = $request->colegiado;
        $colegiado->save($validated);        
        request()->session()->flash('alert-info', 'Colegiado cadastrado com sucesso.');
        
        return redirect("/colegiado");
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
        return view('colegiado.edit', [
            'colegiado' => Colegiado::findOrFail($id)
       ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ColegiadoRequest $request, $id)
    {        
        $validated = $request->validated();

        $colegiado = Colegiado::find($id);
        $colegiado->colegiado = $request->colegiado;
        $colegiado->update($validated);

        request()->session()->flash('alert-info', 'Colegiado/Comissão atualizado com sucesso.');
        
        return redirect("/colegiado");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id_colegiado = $request["id_colegiado"];
        // $existe = Reuniao::Where('idColegiado', $id)->exists();
        $existe = Reuniao::Where('idColegiado', $id_colegiado)->exists();

        if ($existe) {
            request()->session()->flash('alert-warning', 'Este registro não pode ser deletado.');
        } else {
            $colegiado = Colegiado::find($id_colegiado);
            if ($colegiado->delete())
                request()->session()->flash('alert-info', 'Registro deletado com sucesso.');
            else
                request()->session()->flash('alert-danger', 'Não foi possível excluir este registro.');
        }

        //return ($id_colegiado); 
        return redirect("/colegiado");        
    }
}