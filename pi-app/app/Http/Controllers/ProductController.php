<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Tag;

class ProductController extends Controller
{
    public function index()
    {

        return view('product.index')->with('products', Product::all());
    }

    public function create()
    {
        return view('product.create')->with(['categories' => Category::all(), 'tags' => Tag::all()]);//aqui adiciono a categoria e a tag ao produto
    }

    public function store(Request $request){

       $product = Product::create($request->all());
       $product->Tags()->sync($request->tags);
       session()->flash('success', 'O produto foi criado com sucesso');
       return redirect(route('product.index'));


        session()->flash('success', 'O produto foi criado com sucesso');
        return redirect(route('product.index'));
    }


    public function edit(Product $product){

        return view('product.edit')->with([
            'product' => $product,
            'categories' => Category::all(),
            'tags' => Tag::all()]);



        return view('product.edit')->with([
            'product' => $product,
            'categories' => Category::all(),
            'tags' => Tag::all()
        ]);
    }

    public function update(Product $product, Request $request)
    {

        $product->update($request->all());
        $product->Tags()->sync($request->tags);
        session()->flash('success', 'O produto foi alterado');
        return redirect(route('product.index', $product->id));
    }

    public function destroy(Product $product)
    {

        $product->delete();
        session()->flash('success', 'O produto foi apagado');
        return redirect(route('product.index'));
    }

    public function trash(){

        return view('product.trash')->with('products', Product::onlyTrashed()->get());

    }

    public function restore($product_id){
        $product = Product::onlyTrashed()->where('id', $product_id)->first();
        $product->restore();
        session()->flash('success', 'Produto restaurado com sucesso');
        return redirect(route('product.index'));
    }
}


