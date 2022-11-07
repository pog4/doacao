@extends('layouts.app')
@section('title','Alteração Espécie'.$especie->nome}})
@section('content')
    <h1>Alteração Espécie {{$especie->nome}}</h1>
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
    {{Form::open(['route' => ['especie.update',$especie->id], 'method' => 'PUT','enctype'=>'multipart/form-data'])}}
        {{Form::label('nome', 'Nome')}}
        {{Form::text('nome',$especie->nome,['class'=>'form-control','required','placeholder'=>'Nome Espécie'])}}
        {{Form::label('nome_cientifico', 'Nome Científico')}}
        {{Form::text('nome_cientifico',$especie->nome_cientifico,['class'=>'form-control','required','placeholder'=>'Nome Científico'])}}
        {{Form::label('foto', 'Foto')}}
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        <a href="{{url('especie')}}" class="btn btn-secondary">Voltar</a>
    {{Form::close()}}
@endsection