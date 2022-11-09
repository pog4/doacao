@extends('layouts.app')
@section('title','Espécies - '.$especie->nome)
@section('content')
<div class="card w-50 m-auto">
        @php
            $nomeimagem = "";
            if(file_exists("./img/especies/".md5($especie->id).".jpg")) {
                $nomeimagem = "./img/especies/".md5($especie->id).".jpg";
            } elseif (file_exists("./img/especies/".md5($especie->id).".png")) {
                $nomeimagem = "./img/especies/".md5($especie->id).".png";
            } elseif (file_exists("./img/especies/".md5($especie->id).".gif")) {
                $nomeimagem =  "./img/especies/".md5($especie->id).".gif";
            } elseif (file_exists("./img/especies/".md5($especie->id).".webp")) {
                $nomeimagem = "./img/especies/".md5($especie->id).".webp";
            } elseif (file_exists("./img/especies/".md5($especie->id).".jpeg")) {
                $nomeimagem = "./img/especies/".md5($especie->id).".jpeg";
            } else {
                $nomeimagem = "./img/especies/semfoto.webp";
            }
            //echo $nomeimagem;
        @endphp

        <div class="card-header">
            <h1>Espécies - {{$especie->nome}}</h1>
        </div>
        <div class="card-body">
                <h3 class="card-title">ID: {{$especie->id}}</h3>
                Nome: {{$especie->nome}}<br/>
                Nome científico: {{$especie->nome_cientifico}}</p>
        </div>
        <div class="card-footer">
            
            {{Form::open(['route' => ['especie.destroy',$especie->id],'method' => 'DELETE'])}}
            @if ($nomeimagem !== "./img/especies/semfoto.webp")
            {{Form::hidden('foto',$nomeimagem)}}
            @endif
            <a href="{{url('especie/'.$especie->id.'/edit')}}" class="btn btn-success">Alterar</a>
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}

            <a href="{{url('especie/')}}" class="btn btn-secondary">Voltar</a>
            {{Form::close()}}

    </div>
    </div>

@endsection
