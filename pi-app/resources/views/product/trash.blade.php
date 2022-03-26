@extends('layouts.app')

@section('content')
<a class="btn btn-lg btn-success float-end me-5" href="{{route('product.index')}}">Criar Produto</a>

<div class="container mt-2">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome Produto</th>
                <th>ID Categoria</th>
                <th>ID Categoria</th>
                <th>Nome Categoria</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>QTD Estoque</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->Category->id}}</td>
                <td>{{$product->Category->name}}</td>
                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td><a href="{{route('product.restore', $product->id)}}">Restaurar</a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
