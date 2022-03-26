@extends('layouts.app')

@section('content')

<section class="container mt-2 text-center">
    <form class="text-center row justify-content-center d-flex" action="{{route('product.store')}}" method="POST">
        @csrf
        <div class="col-7">
            <input class="form-control mt-3 text-center" placeholder="Nome Produto" type="text" name="name" >
        </div>

        <div class="col-7">
            <input class="form-control mt-3 text-center" placeholder="Descrição" type="text" name="description" >
        </div>

        <div class="col-7">
            <input class="form-control mt-3 text-center" placeholder="Preço" type="number" step="0.1" name="price" >
        </div>

        <div class="col-7">
            <input class="form-control mt-3 text-center" placeholder="Estoque" type="number" name="stock" >
        </div>

        </div>

        <div class="col-7">
            Selecione uma categoria:
            <select class="form-select" name="category_id">
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
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
        <button class="btn btn-lg w-50 btn-success mt-3" type="submit">Enviar</button>

    </form>
</section>@endsection
