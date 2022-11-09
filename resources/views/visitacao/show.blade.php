@extends('layouts.app')
@section('title','Visitação - '.$visitacao->nome)
@section('content')
<div class="card w-50 m-auto">

        @php
            $nomeimagem = "";
            if(file_exists("./img/visitacaos/".md5($visitacao->id).".jpg")) {
                $nomeimagem = "./img/visitacaos/".md5($visitacao->id).".jpg";
            } elseif (file_exists("./img/visitacaos/".md5($visitacao->id).".png")) {
                $nomeimagem = "./img/visitacaos/".md5($visitacao->id).".png";
            } elseif (file_exists("./img/visitacaos/".md5($visitacao->id).".gif")) {
                $nomeimagem =  "./img/visitacaos/".md5($visitacao->id).".gif";
            } elseif (file_exists("./img/visitacaos/".md5($visitacao->id).".webp")) {
                $nomeimagem = "./img/visitacaos/".md5($visitacao->id).".webp";
            } elseif (file_exists("./img/visitacaos/".md5($visitacao->id).".jpeg")) {
                $nomeimagem = "./img/visitacaos/".md5($visitacao->id).".jpeg";
            } else {
                $nomeimagem = "./img/visitacaos/semfoto.webp";
            }
            //echo $nomeimagem;
        @endphp

        <div class="card-header">
            <h1>Visitação - {{$visitacao->nome}}</h1>
        </div>
        <div class="card-body">
                <h3 class="card-title">ID: {{$visitacao->id}}</h3>
                Nome: {{$visitacao->nome}}<br/>
                sobrenome: {{$visitacao->sobrenome}}<br/>
                E-mail: {{$visitacao->email}}<br/>
                Idade: {{$visitacao->idade}}<br/>
                Data de vinda: {{$visitacao->vinda}}</p>

        </div>
        <div class="card-footer">
            
            {{Form::open(['route' => ['visitacao.destroy',$visitacao->id],'method' => 'DELETE'])}}
            @if ($nomeimagem !== "./img/visitacaos/semfoto.webp")
            {{Form::hidden('foto',$nomeimagem)}}
            @endif
            <!--<a href="{{url('visitacao/'.$visitacao->id.'/edit')}}" class="btn btn-success">Alterar</a>-->
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}

            <a href="{{url('visitacao/')}}" class="btn btn-secondary">Voltar</a>
            {{Form::close()}}

    </div>
    </div>

@endsection