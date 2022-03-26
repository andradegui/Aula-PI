@extends('layouts.app')


@section('content')

<div class="container mt-2">
    <form action="{{route('tag.store')}}" method="POST">
        @csrf
        Nome da tag: <input type="text" name="name">
        <button type="submit" class="btn btn-lg btn-success">Enviar</button>
    </form>
</div>
@endsection
