<?php

namespace Stoneworking\Http\Controllers\Admin;

// use Illuminate\Http\Request;
// use Stoneworking\Http\Requests;
use Stoneworking\Http\Controllers\Controller;
use Stoneworking\Models\Category;
use Stoneworking\Models\Work;

class PagesController extends Controller
{
    /**
     * Display the public home page
     * 
     * @return Response
     */
    public function home()
    {
      	return view('public/home', ['requestUri' => '']);
    }

    /**
     * Shows categories with works
     *
     * @return Response
     */
    public function categories()
    {
        $categories = Category::where(['active' => true])
            ->select(['id', 'name', 'permalink'])
            ->get()
            ->map(function($category) {
                $category->works = $category->publicLatestWorks($category->id,4);
                return $category;
            });

        return view('public/categories', compact('categories'));
    }

    /**
     * Show a category with its works
     *
     * @param string $permalink Category Permalink
     * @return Response
     */
    public function categoryWorks($permalink)
    {
        $category = Category::publicCategoryWithWorks($permalink);

        // Redirect to categories list if category is inactive
        if(!$category->active) :
            return redirect()->route('public.categories');
        endif;

        return view('public/category-works', compact('category'));
    }

    /**
     * Show work page
     *
     * @param string $permalink
     * @return Response
     */
    public function work($permalink)
    {
        $work = Work::publicWork($permalink);

        return view('public/work', compact('work'));
    }
}
