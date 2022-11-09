@extends('layouts.app')
@section('title','Agendamento')
@section('content')
    <h1>Agendar Visitação</h1>
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
        {{Form::open(['route' => 'visitacao.store', 'method' => 'POST','enctype'=>'multipart/form-data'])}}
        {{Form::label('nome', 'Nome')}}
        {{Form::text('nome','',['class'=>'form-control','required','placeholder'=>'Nome'])}}
        {{Form::label('sobrenome', 'Sobrenome')}}
        {{Form::text('sobrenome','',['class'=>'form-control','required','placeholder'=>'Sobrenome'])}}
        {{Form::label('email', 'E-mail')}}
        {{Form::text('email','',['class'=>'form-control','required','placeholder'=>'email'])}}
        {{Form::label('idade', 'Idade')}}
        {{Form::text('idade','',['class'=>'form-control','required','placeholder'=>'Idade'])}}
        {{Form::label('vinda', 'Dia da Visita')}}
        {{Form::date('vinda','',['class'=>'form-control','required','placeholder'=>''])}}
        <br />
        {{Form::submit('Salvar',['class'=>'btn btn-success'])}}
        {!!Form::button('Cancelar',['onclick'=>'javascript:history.go(-1)', 'class'=>'btn btn-secondary'])!!}
    {{Form::close()}}
@endsection
