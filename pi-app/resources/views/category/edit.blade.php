@extends(layouts.app)

@section('content')
<a href="{{route('category.index')}}">Produto</a>
<a href="{{route('category.create')}}">Criar Produto</a>
<a href="{{route('category.trash')}}">Lixeira Produto</a>

<form action= "{{route('category.edit', $category->id)}}" method="POST">
    @csrf
    @method("PUT")
    Nome da categoria: <input type="text" name="name" value="{{$category->name}}">
    <button type="submit">Enviar</button>

</form>
@endsection
