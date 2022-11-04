@extends('home')
@section('title','Inserir nova Espécie')
@section('content')
    <h1>Inserir nova Espécie</h1>
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
        {{Form::open(['route' => 'especie.store', 'method' => 'POST','enctype'=>'multipart/form-data'])}}
        {{Form::label('nome', 'Nome')}}
        {{Form::text('nome','',['class'=>'form-control','required','placeholder'=>'Nome Espécie'])}}
        {{Form::label('nome_cientifico', 'Nome Científico')}}
        {{Form::text('nome_cientifico','',['class'=>'form-control','required','placeholder'=>'Nome Científico'])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
    {{Form::close()}}
@endsection
