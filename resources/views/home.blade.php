@extends('layouts.app')
@section('title','Doacão')
@section('content')
 <br> <br> <br> <br>
    <div class="row justify-content-center">
        <h1 class="text-success text-center">DOACÃO</h1>
        <div class="col-md-11 bg-secondary text-light">
            <div class="fluid px-3 my-2 h4 text-center text-dark">{{ __('Painel de controle') }}</div>
            <div class="row text-center h5">
                <div class="col m-3 bg-success text-black">
                    <div class="card-header p-2">Animais abrigados</div>
                    <div class="card-body h3 p-5">
                        {{$numAnimais}}
                    </div>
                </div>
                <div class="col m-3 bg-info text-light">
                    <div class="card-header p-2">Espécies abrigadas</div>
                    <div class="card-body h3 p-5">
                        {{$numEspecies}}
                    </div>
                </div>
                <div class="col m-3 bg-warning text-dark">
                    <div class="card-header p-2">Visitas Agendadas</div>
                    <div class="card-body h3 p-5">
                        {{$numVisitacaos}}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection