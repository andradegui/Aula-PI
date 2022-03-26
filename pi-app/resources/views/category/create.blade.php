@extends('layouts.app')


@section('content')
<a href="{{route('category.index')}}">Produto</a>
<a href="{{route('category.create')}}">Criar Produto</a>
<a href="{{route('category.trash')}}">Lixeira Produto</a>


<form action= "{{route('category.store')}}" method="POST">
    @csrf
    Nome da categoria: <input type="text" name="name">
    <button type="submit">Enviar</button>

</form>
@endsection
