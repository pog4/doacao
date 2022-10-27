@extends('home')
@section('title','Listagem de Animais')
@section('content')
    <h1>Listagem de Animais</h1>
    @if(Session::has('mensagem'))
        <div class="alert alert-info">
            {{Session::get('mensagem')}}
        </div>
    @endif

    <!-- buscar talvez depois -->

<table class="table table-striped">
        @foreach ($animals as $animal)
            <tr>
                <td>
                    <a href="{{url('animals/'.$animal->id)}}">{{$animal->nome}}</a>
                </td>
            </tr>
        @endforeach
    </table>
    {{ $animals->links() }}
@endsection