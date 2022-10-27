extends('home')
@section('title','Doação - {{$animal->nome}}')
@section('content')
<div class="card w-50 m-auto">
        @php
            $nomeimagem = "";
            if(file_exists("./img/contatos/".md5($contato->id).".jpg")) {
                $nomeimagem = "./img/contatos/".md5($contato->id).".jpg";
            } elseif (file_exists("./img/contatos/".md5($contato->id).".png")) {
                $nomeimagem = "./img/contatos/".md5($contato->id).".png";
            } elseif (file_exists("./img/contatos/".md5($contato->id).".gif")) {
                $nomeimagem =  "./img/contatos/".md5($contato->id).".gif";
            } elseif (file_exists("./img/contatos/".md5($contato->id).".webp")) {
                $nomeimagem = "./img/contatos/".md5($contato->id).".webp";
            } elseif (file_exists("./img/contatos/".md5($contato->id).".jpeg")) {
                $nomeimagem = "./img/contatos/".md5($contato->id).".jpeg";
            } else {
                $nomeimagem = "./img/contatos/semfoto.webp";
            }
            //echo $nomeimagem;
        @endphp

        <div class="card-header">
            <h1>Doação - {{$animal->nome}}</h1>
        </div>
        <div class="card-body">
                <h3 class="card-title">ID: {{$animal->id}}</h3>
                Telefone: {{$animal->telefone}}<br/>
                Cidade: {{$animal->cidade}}<br/>
                Estado: {{$animal->estado}}</p>
        </div>
        <div class="card-footer">
            
            {{Form::open(['route' => ['animals.destroy',$animal->id],'method' => 'DELETE'])}}
            @if ($nomeimagem !== "./img/animals/semfoto.webp")
            {{Form::hidden('foto',$nomeimagem)}}
            @endif
            <a href="{{url('animals/'.$animal->id.'/edit')}}" class="btn btn-success">Alterar</a>
            {{Form::submit('Excluir',['class'=>'btn btn-danger','onclick'=>'return confirm("Confirma exclusão?")'])}}
        @endif
            <a href="{{url('animals/')}}" class="btn btn-secondary">Voltar</a>
            {{Form::close()}}
        @endif

    </div>
    </div>

@endsection
