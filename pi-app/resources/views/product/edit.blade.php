@extends('layouts.app')

@section('content')

<a class="btn btn-lg btn-success float-end me-5 mb-2" href="{{route('product.create')}}">Criar Produto</a>


<section class="container mt-2 text-center">
    <form class="text-center row justify-content-center d-flex" action="{{route('product.edit', $product->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="col-7">
            <input class="form-control mt-3 text-center" placeholder="Nome Produto" type="text" name="name" value="{{$product->name}}">
        </div>

        <div class="col-7">
            <input class="form-control mt-3 text-center" placeholder="Descrição" type="text" name="description" value="{{$product->description}}">
        </div>

        <div class="col-7">
            <input class="form-control mt-3 text-center" placeholder="Preço" type="number" step="0.1" name="price" value="{{$product->price}}">
        </div>

        <div class="col-7">
            <input class="form-control mt-3 text-center" placeholder="Estoque" type="number" name="stock" value="{{$product->stock}}">
        </div>

        </div>

        <div class="col-7">
            Selecione uma categoria:
            <select class="form-select" name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-7">
            Selecione uma tag:
            <select class="form-select" multiple name="tags[]">
                @foreach($tags as $tag)
                <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-7">
            <input class="form-control mt-3 text-center" placeholder="Image" type="file" name="image">
        </div>

        <button class="btn btn-lg w-50 btn-success mt-3" type="submit">Enviar</button>

    </form>
</section>
@endsection
