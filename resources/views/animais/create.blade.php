@extends('home')
@section('title','Inserir novo Pet')
@section('content')
    <h1>Inserir novo Pet</h1>
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
    <br />
    {{Form::open(['route' => 'contatos.store', 'method' => 'POST','enctype'=>'multipart/form-data'])}}
    {{Form::label('nome', 'Nome')}}
        {{Form::text('nome','',['class'=>'form-control','required','placeholder'=>'Nome completo'])}}
        {{Form::label('especie', 'Espécie')}}
        {{Form::text('especie','',['class'=>'form-control','required','placeholder'=>'Nome da espécie'])}}
        {{Form::label('raca', 'raça')}}
        {{Form::text('raca','',['class'=>'form-control','required','placeholder'=>'Nome da raça'])}}
        {{Form::label('historico', 'Histórico')}}
        {{Form::text('historico','',['class'=>'form-control','required','placeholder'=>'Histórico'])}}
        {{Form::label('caracteristicas', 'Características')}}
        {{Form::text('caracteristicas','',['class'=>'form-control','required','placeholder'=>'Características'])}}
        {{Form::label('foto', 'Foto')}}
        {{Form::file('foto',['class'=>'form-control','id'=>'foto'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
    {{Form::close()}}
@endsection
