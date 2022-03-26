@extends('layouts.app')

@section('content')


<div class="container mt-2">
    <form action="{{route('tag.edit', $tag->id)}}" method="POST">
        @csrf
        @method("PUT")
        Nome da tag: <input type="text" name="name" value="{{$tag->name}}">
        <button type="submit" class="btn btn-lg btn-success">Enviar</button>

    </form>
</div>
@endsection
