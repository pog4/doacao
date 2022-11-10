@extends('layouts.app')
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
                $nomeimagem = "./img/animals/semfoto.jpg";
            }
            //echo $nomeimagem;
        @endphp

        {{Html::image(asset($nomeimagem),'Foto de '.$animal->nome,["class"=>"img-thumbnail"])}}

        <div class="card-header">
            <h1>Doação - {{$animal->nome}}</h1>
        </div>
        <div class="card-body">
                <h3 class="card-title">ID: {{$animal->id}}</h3>
                <table class="table table-light table-striped">
                    <thead>
                        <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Espécie</th>
                        <th scope="col">Raça</th>
                        <th scope="col">Histórico</th>
                        <th scope="col">Características</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td>{{$animal->nome}}</td>
                        <td>{{$animal->id_esp}} - {{$animal->especie->nome}}</td>
                        <td>{{$animal->raca}}</td>
                        <td>{{$animal->historico}}</td>
                        <td>{{$animal->caracteristicas}}</td>
                        </tr>
                    </tbody>
                </table>
        </div>
        <div class="card-footer">
            
            {{Form::open(['route' => ['animal.destroy',$animal->id],'method' => 'DELETE'])}}
            @if ($nomeimagem !== "./img/animals/semfoto.jpg")
            {{Form::hidden('foto',$nomeimagem)}}
            @endif
            <a href="{{url('animal/'.$animal->id.'/edit')}}" class="btn btn-success">Alterar</a>
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}

            <a href="{{url('animal/')}}" class="btn btn-secondary">Voltar</a>
            {{Form::close()}}

    </div>
    </div>
@endsection
