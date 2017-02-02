<?php

namespace Stoneworking\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Stoneworking\Http\Requests;
use Stoneworking\Http\Controllers\Controller;
use Stoneworking\Http\Requests\CategoriesRequest;
use Stoneworking\Models\Category;
use Stoneworking\Models\Section;
use Stoneworking\Traits\ModelUtilityTrait;

class CategoriesController extends Controller
{
    use ModelUtilityTrait;

    /**
     * Display all categories.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::getCategoriesWithWorksCount();

        return view('admin/categories/index', compact('categories'));
    }

    /**
     * Display a specific category.
     *
     * @param string $permalink
     * @return Response
     */
    public function show($permalink)
    {
        $category = Category::where('permalink', $permalink)->first();

        return view('admin/categories/show', compact('category'));
    }

    /**
     * Show the form for creating a new category.
     *
     * @return Response
     */
    public function create()
    {
        return view('admin/categories/create');
    }

    /**
     * Store a newly created category in storage.
     *
     * @param  CategoriesRequest  $request
     * @return Response
     */
    public function store(CategoriesRequest $request)
    {
        $category = new Category([
            'name'      => $request->name,
            'permalink' => self::urlFriendly($request->permalink),
        ]);

        $category->save();

        flash()->success('Se creó la categoría "'.$category->name.'" de forma satisfactoria');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $permalink
     * @return Response
     */
    public function edit($permalink)
    {
        $category = Category::where('permalink', $permalink)->first();

        return view('admin/categories/edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param integer $id
     * @param CategoriesRequest $request
     * @return Response
     */
    public function update($id, CategoriesRequest $request)
    {
        $category = Category::find($id);

        $category->name             = $request->name;
        $category->permalink        = self::urlFriendly($request->permalink);
        $category->meta_title       = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_robots      = $request->meta_robots;

        $category->save();

        flash()->success('Se actualizó la categoría "'.$category->name.'" de forma satisfactoria');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Update category status
     *
     * @param integer $id
     * @return RedirectResponse
     */
    public function status($id)
    {
        $category = Category::where('id',$id)->select('id','name','active')->first();

        switch ($category->active) :
            case true:
                $category->active = false;
                $status = 'desactivada';
                break;

            case false:
                $category->active = true;
                $status = 'activada';
                break;
        endswitch;

        $category->save();

        session()->flash('message', 'La categoría "'.$category->name.'" ha sido '.$status.' satisfactoriamente');

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified category from storage.
     *
     * @param integer $id
     * @return Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);

        $category->delete();

        flash()->success("Se eliminó la categoría {$category->name} correctamente");

        return redirect()->route('admin.categories.index');
    }
}
