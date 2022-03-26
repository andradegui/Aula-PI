@extends('layouts.app')

@section('content')

<a class="btn btn-lg btn-success float-end me-5" href="{{route('category.create')}}">Criar Categoria</a>
<div class="container mt-3">




<table>
@foreach($categories as $category)
<tr>
<td>{{$category->id}}</td>
<td>{{$category->name}}</td>
<td><a href="{{route('category.restore', $category->id)}}">Restaurar</a></td>


</tr>
@endforeach
</table>
</div>
@endsection
