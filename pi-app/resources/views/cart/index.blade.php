@extends('layouts.app')
@section('content')


<section class="container mt-5">
    <table class="table">
        <thead>
            <tr>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço</th>
            </tr>
        </thead>

        <tbody>
            @foreach($itens as $item)
            <tr>
                <td>{{$item->Product->name}}</td>
                <td>{{$item->units}}</td>
                <td>{{$item->Product->price}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
