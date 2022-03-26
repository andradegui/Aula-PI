@extends('layouts.app')

@section('content')
<a class="btn btn-lg btn-success float-end me-5" href="{{route('tag.index')}}">Criar Tag</a>

<div class="container mt-2">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome da Tag</th>
                <th>QTD Produtos</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
                <td>{{$tag->id}}</td>
                <td>{{$tag->name}}</td>
                <td>{{$tag->Products->count()}}</td>
                <td><a href="{{route('tag.restore', $tag->id)}}">Restaurar</a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
