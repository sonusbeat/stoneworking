<?php

namespace Stoneworking\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Stoneworking\Http\Requests;
use Stoneworking\Http\Controllers\Controller;
use Stoneworking\Models\Tag;
use Stoneworking\Traits\ModelUtilityTrait;

class TagsController extends Controller
{
    use ModelUtilityTrait;

    /**
     * Display a listing of the tag.
     *
     * @return Response
     */
    public function index()
    {
        $tags = Tag::orderBy('name')->select('id','name','permalink')->get();

        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new tag.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = Tag::create([
            'name' => $request->name,
            'permalink' => self::urlFriendly($request->permalink),
        ]);

        flash()->success('¡ Bien Hecho !', 'Se creó la etiqueta "'.$tag->name.'" correctamente');

        return redirect()->route('admin.tags.index');
    }

    /**
     * Show the form for editing the specified tag.
     *
     * @param  string $permalink
     * @return Response
     */
    public function edit($permalink)
    {
        $tag = Tag::where('permalink',$permalink)->first();

        return view('admin.tags.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $tag = Tag::find($id);

        $tag->name      = $request->name;
        $tag->permalink = self::urlFriendly($request->permalink, false);

        $tag->save();

        flash()->success('¡ Bien Hecho !', 'Se actualizó la etiqueta correctamente');

        return redirect()->route('admin.tags.index');
    }

    /**
     * Remove the specified tag from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);

        $tag->delete();

        flash()->success('¡ Bien Hecho !', 'Se eliminó la etiqueta correctamente');

        return redirect()->route('admin.tags.index');
    }
}
