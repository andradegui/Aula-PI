@extends('layouts.app')

@section('content')
<a class="btn btn-lg btn-success float-end me-5" href="{{route('product.create')}}">Criar Produto</a>

<div class="container mt-2">

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Nome Produto</th>
                <th>ID Categoria</th>
                <th>Nome Categoria</th>
                <th>Tag</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>QTD Estoque</th>
                <th>Editar</th>
                <th>Apagar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td><img src="{{asset($product->image)}}" style="width: 35px; height: 35px;" alt=""></td>
                <td>{{$product->name}}</td>
                <td>{{$product->Category->id}}</td>
                <td>{{$product->Category->name}}</td>

                <td>
                    @foreach($product->Tags()->get() as $tag)
                    {{$tag->name}}|
                    @endforeach
                </td>

                <td>{{$product->description}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->stock}}</td>
                <td><a href="{{route('product.edit', $product->id)}}">Editar</a></td>
                <td><a href="{{route('product.destroy', $product->id)}}">Apagar</a></td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
