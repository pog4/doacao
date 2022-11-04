@extends('home')
@section('title','Pet - '.$animal->nome)
@section('content')
<div class="card w-50 m-auto">
        @php
            $nomeimagem = "";
            if(file_exists("./img/animals/".md5($animal->id).".jpg")) {
                $nomeimagem = "./img/animals/".md5($animal->id).".jpg";
            } elseif (file_exists("./img/animals/".md5($animal->id).".png")) {
                $nomeimagem = "./img/animals/".md5($animal->id).".png";
            } elseif (file_exists("./img/animals/".md5($animal->id).".gif")) {
                $nomeimagem =  "./img/animals/".md5($animal->id).".gif";
            } elseif (file_exists("./img/animals/".md5($animal->id).".webp")) {
                $nomeimagem = "./img/animals/".md5($animal->id).".webp";
            } elseif (file_exists("./img/animals/".md5($animal->id).".jpeg")) {
                $nomeimagem = "./img/animals/".md5($animal->id).".jpeg";
            } else {
                $nomeimagem = "./img/animals/semfoto.webp";
            }
            //echo $nomeimagem;
        @endphp

        {{Html::image(asset($nomeimagem),'Foto de '.$animal->nome,["class"=>"img-thumbnail"])}}

        <div class="card-header">
            <h1>Doação - {{$animal->nome}}</h1>
        </div>
        <div class="card-body">
                <h3 class="card-title">ID: {{$animal->id}}</h3>
                Nome: {{$animal->nome}}<br/>
                Espécie: {{$animal->id_esp}} - {{$animal->especie->nome}}<br/>
                Raça: {{$animal->raca}}<br/>
                Histórico: {{$animal->historico}}<br/>
                Características: {{$animal->caracteristicas}}</p>
        </div>
        <div class="card-footer">
            
            {{Form::open(['route' => ['animal.destroy',$animal->id],'method' => 'DELETE'])}}
            @if ($nomeimagem !== "./img/animals/semfoto.webp")
            {{Form::hidden('foto',$nomeimagem)}}
            @endif
            <a href="{{url('animal/'.$animal->id.'/edit')}}" class="btn btn-success">Alterar</a>
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}

            <a href="{{url('animal/')}}" class="btn btn-secondary">Voltar</a>
            {{Form::close()}}

    </div>
    </div>

@endsection
