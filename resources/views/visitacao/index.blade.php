@extends('layouts.app')
@section('title','Listagem de Visitação')
@section('content')
    <h1>Listagem de Visitação</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-info">
            {{Session::get('mensagem')}}
        </div>
    @endif
    {{Form::open(['url'=>'visitacao/buscar','method'=>'GET'])}}
        <div class="row">
            
                <div class="col-sm-3">
                    <a class="btn btn-success" href="{{url('visitacao/create')}}">Criar</a>
                </div>
            
            <div class="col-sm-9">
                <div class="input-group ml-5">
                    @if($busca !== null)
                        &nbsp;<a class="btn btn-info" href="{{url('visitacao/')}}">Todos</a>&nbsp;
                    @endif
                    {{Form::text('busca',$busca,['class'=>'form-control','required','placeholder'=>'buscar'])}}
                    &nbsp;
                    <span class="input-group-btn">
                        {{Form::submit('Buscar',['class'=>'btn btn-secondary'])}}
                    </span>
                </div>
            </div>
        </div>
    {{Form::close()}}
    <br />

<table class="table table-striped">
    <tr>
        <th>Nome</th>
        <th>ano/mês/dia</th>
    </tr>
        @foreach ($visitacaos as $visitacao)
            <tr>
                <td>
                    <a href="{{url('visitacao/'.$visitacao->id)}}">{{$visitacao->nome}}</a>
                </td>
                <td>{{$visitacao->vinda}}</td>
            </tr>
        @endforeach
    </table>
@endsection