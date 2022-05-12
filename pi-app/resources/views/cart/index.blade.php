@extends('layouts.store')
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
                <td>{{$item->Product->price}}</td>
                <td>
                    <form action="{{route('cart.store', $item->Product->id)}}" method="POST" style="display:inline;">
                        @csrf
                        <button type="submit" class="btn btn-primary btn-sm">+</button>
                    </form>
                    {{$item->units}}
                    <form action="{{route('cart.store', $item->Product->id)}}" method="POST" style="display:inline">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-primary btn-sm">-</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
