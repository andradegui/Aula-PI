<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;


class TagController extends Controller
{
    public function index()
    {
        return view('tag.index')->with('tags', Tag::all());
    }

    public function create()
    {
        return view('tag.create');
    }

    public function store(Request $request)
    {
        $tag = Tag::create($request->all());
        session()->flash('success', 'A tag foi criado com sucesso');
        return redirect(route('tag.index'));
    }

    public function edit(Tag $tag){

        return view('tag.edit')->with('tag', $tag);

    }

    public function update(Tag $tag, Request $request){

        $tag->update($request->all());
        session()->flash('success', 'A tag foi alterado');
        return redirect(route('tag.index', $tag->id));
    }

    public function destroy(Tag $tag){

        $tag->delete();
        session()->flash('success', 'A tag foi apagado');
        return redirect(route('tag.index'));
    }

    public function trash()
    {
        return view('tag.trash')->with('tags', Tag::onlyTrashed()->get());
    }

    public function restore($tag_id)
    {
        $tag = Tag::onlyTrashed()->where('id', $tag_id)->first();
        $tag->restore();
        session()->flash('sucess', 'Tag restaurado com sucesso');
        return redirect(route('tag.index'));
    }
}
