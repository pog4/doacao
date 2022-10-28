<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Especies;
use Session;

class EspeciesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $especies = Especies::all();
        return view('especie.index',array('especies' => $especies,'busca'=>null));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function buscar(Request $request) {
    $especies = Especies::where('nome','LIKE','%'.$request->input('busca').'%')->orwhere('nome_cientifico','LIKE','%'.$request->input('busca').'%')->get();
     return view('especie.index',array('especies' => $especies,'busca'=>$request->input('busca')));
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'nome' => 'required',
            'nome_cientifico' => 'required',
        ]);
        $especie = new Especies();
        $especie->nome = $request->input('nome');
        $especie->nome_cientifico = $request->input('nome_cientifico');
        if($especie->save()) {
            return redirect('especies');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $especie = Especies::find($id);
        return view('especie.show',array('especie' => $especie));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $especie = Especies::find($id);
        return view('especie.edit',array('especie' => $especie));
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

        $this->validate($request,[
            'nome' => 'required',
            'nome_cientifico' => 'required',
        ]);

        $especie = Especies::find($id);
        $especie->nome = $request->input('nome');
        $especie->nome_cientifico = $request->input('nome_cientifico');
        if($especie->save()) {
            Session::flash('mensagem','especie alterado com sucesso');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $especie = Especies::find($id);
        $especie->delete();
        Session::flash('mensagem','especie Excluído com Sucesso');
        return redirect(url('especies/'));
    }
}