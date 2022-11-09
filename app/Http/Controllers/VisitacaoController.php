<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Visitacao;
use Session;

class VisitacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visitacaos = Visitacao::all();
        return view('visitacao.index',array('visitacaos' => $visitacaos,'busca'=>null));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function buscar(Request $request) {
    $visitacaos = Visitacao::where('nome','LIKE','%'.$request->input('busca').'%')->orwhere('sobrenome','LIKE','%'.$request->input('busca').'%')->get();
     return view('visitacao.index',array('visitacaos' => $visitacaos,'busca'=>$request->input('busca')));
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visitacao.create');
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
            'sobrenome' => 'required',
            'email' => 'required',
            'idade' => 'required',
            'vinda' => 'required',
        ]);
        $visitacao = new Visitacao();
        $visitacao->nome = $request->input('nome');
        $visitacao->sobrenome = $request->input('sobrenome');
        $visitacao->email = $request->input('email');
        $visitacao->idade = $request->input('idade');
        $visitacao->vinda = $request->input('vinda');
        if($visitacao->save()) {
            return redirect('visitacao');
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
        $visitacao = Visitacao::find($id);
        return view('visitacao.show',array('visitacao' => $visitacao));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $visitacao = Visitacao::find($id);
        return view('visitacao.edit',array('visitacao' => $visitacao));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitacao = Visitacao::find($id);
        $visitacao->delete();
        Session::flash('mensagem','Agendamento Excluída com Sucesso');
        return redirect(url('visitacao/'));
    }
}