<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Colegiado;

class ColegiadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
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
    //public function store(ColegiadoRequest $request)
    public function store()
    {
        //$validated = $request->validated();
        $colegiado = new Colegiado;
        $colegiado->colegiado = $request->colegiado;
        //$colegiado->save($validated);
        $colegiado->save();
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
