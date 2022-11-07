<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Animal;
use App\Models\Especies;
use Session;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animals = Animal::all();
        return view('animal.index',array('animals' => $animals,'busca'=>null));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function buscar(Request $request) {
    $animals = Animal::where('nome','LIKE','%'.$request->input('busca').'%')->orwhere('especie','LIKE','%'.$request->input('busca').'%')->get();
     return view('animal.index',array('animals' => $animals,'busca'=>$request->input('busca')));
    }
    


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especies = Especies::all();
        return view('animal.create',['especies'=>$especies]);
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
            'id_esp' => 'required',
            'raca' => 'required',
            'historico' => 'required',
            'caracteristicas' => 'required',
        ]);
        $animal = new Animal();
        $animal->nome = $request->input('nome');
        $animal->id_esp = $request->input('id_esp');
        $animal->raca = $request->input('raca');
        $animal->historico = $request->input('historico');
        $animal->caracteristicas = $request->input('caracteristicas');
        if($animal->save()) {
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($animal->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\animals'),$nomearquivo);
            }
            return redirect('animal');
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
        $animal = Animal::find($id);
        return view('animal.show',['animal' => $animal]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $animal = Animal::find($id);
        $especies = Especies::all();
        return view('animal.edit',['especies'=>$especies,'animal' => $animal]);
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
            'id_esp' => 'required',
            'raca' => 'required',
            'historico' => 'required',
            'caracteristicas' => 'required',
        ]);

        $animal = Animal::find($id);
            if($request->hasFile('foto')){
                $imagem = $request->file('foto');
                $nomearquivo = md5($animal->id).".".$imagem->getClientOriginalExtension();
                $request->file('foto')->move(public_path('.\img\animals'),$nomearquivo);
            }

        $animal = Animal::find($id);
        $animal->nome = $request->input('nome');
        $animal->id_esp = $request->input('id_esp');
        $animal->raca = $request->input('raca');
        $animal->historico = $request->input('historico');
        $animal->caracteristicas = $request->input('caracteristicas');
        if($animal->save()) {
            Session::flash('mensagem','animal alterado com sucesso');
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
        $animal = Animal::find($id);
        $animal->delete();
        Session::flash('mensagem','animal Excluído com Sucesso');
        return redirect(url('animal/'));
    }
}