@extends('home')
@section('title','Alteração Animal {{$animal->nome}}')
@section('content')
    <h1>Alteração Animal {{$animal->nome}}</h1>
    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{$error}}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    @if(Session::has('mensagem'))
        <div class="alert alert-success">
            {{Session::get('mensagem')}}
        </div>
    @endif
    <br />
    {{Form::open(['route' => ['animals.update',$animal->id], 'method' => 'PUT','enctype'=>'multipart/form-data'])}}
        {{Form::label('nome', 'Nome')}}
        {{Form::text('nome',$animal->nome,['class'=>'form-control','required','placeholder'=>'Nome completo'])}}
        {{Form::label('especie', 'Espécie')}}
        {{Form::text('especie',$animal->especie,['class'=>'form-control','required','placeholder'=>'Nome da espécie'])}}
        {{Form::label('raca', 'raça')}}
        {{Form::text('raca',$animal->raca,['class'=>'form-control','required','placeholder'=>'Nome da raça'])}}
        {{Form::label('historico', 'Histórico')}}
        {{Form::text('historico',$animal->historico,['class'=>'form-control','required','placeholder'=>'Histórico'])}}
        {{Form::label('caracteristicas', 'Características')}}
        {{Form::text('caracteristicas',$animal->caracteristicas,['class'=>'form-control','required','placeholder'=>'Características'])}}
        {{Form::label('foto', 'Foto')}}
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        <a href="{{url('animals')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
@endsection