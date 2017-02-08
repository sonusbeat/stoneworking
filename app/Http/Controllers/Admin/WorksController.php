<?php

namespace Stoneworking\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Stoneworking\Http\Requests;
use Stoneworking\Http\Controllers\Controller;
use Stoneworking\Http\Requests\WorksRequest;
use Stoneworking\Models\Category;
use Stoneworking\Models\Section;
use Stoneworking\Models\Work;
use Stoneworking\Traits\ImageTrait;
use Stoneworking\Traits\ModelUtilityTrait;

class WorksController extends Controller
{
    use ImageTrait, ModelUtilityTrait;

    /**
     * WorksController constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @var string $permalink
     * @return Response
     */
    public function index($permalink)
    {
        $category = Category::where('permalink', $permalink)
            ->select('id','name','permalink')
            ->first();

        $works = Work::orderedWithCategory($category->id,'desc');

        return view('admin/works/index', compact('category', 'works'));
    }

    /**
     * Display the specified resource.
     *
     * @param string $categorypermalink
     * @param string $workPermalink
     * @return Response
     */
    public function show($categoryPermalink, $workPermalink)
    {
        $category = Category::where('permalink', $categoryPermalink)->select('name','permalink')->first();
        $work = Work::where('permalink',$workPermalink)->first();

        return view('admin/works/show', compact('category','work'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param string $categoryPermalink
     * @return \Illuminate\Http\Response
     */
    public function create($categoryPermalink)
    {
        $category = Category::where('permalink', $categoryPermalink)
            ->select('id','permalink')->first();

        return view('admin/works/create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param integer $categoryId
     * @param WorksRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store($categoryId, WorksRequest $request)
    {
        $categoryPermalink = Category::where('id', $categoryId)->pluck('permalink');

         $work = new Work([
             'category_id' => $categoryId,
             'name'        => $request->name,
             'permalink'   => self::urlFriendly($request->permalink),
             'description' => $request->description,
             'image_alt'   => $request->image_alt,
             'meta_title'       => $request->meta_title,
             'meta_description' => $request->meta_description,
             'meta_robots'      => $request->meta_robots,
         ]);

        $work->save();

        if($request->hasFile('image')):
            $file = $request->file('image');
            $image = \Image::make($file);

            $fileName = self::sanitizeName($file->getClientOriginalName());
            $fileExtension = $file->getClientOriginalExtension();
            $path = public_path('img/portfolio');

            $imageLarge     = self::setSuffix($fileName, $fileExtension, 'large');
            $imageMedium    = self::setSuffix($fileName, $fileExtension, 'medium');
            $imageThumbnail = self::setSuffix($fileName, $fileExtension, 'thumbnail');

            // Large Size
            \Image::make($file)->resize(1280, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$path}/{$imageLarge}");

            // Medium Size
            \Image::make($file)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$path}/{$imageMedium}");

            // Thumbnail Size
            $image->fit(400)->save("{$path}/{$imageThumbnail}");

            $work->update([
                'image' => self::removeExtension($fileName, $fileExtension)
            ]);
        endif;

        flash()->success('¡ Bien Hecho !', "Se creó el trabajo correctamente");

        return redirect()->route('admin.categories.works.index', $categoryPermalink);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $categoryPermalink
     * @param string $workPermalink
     * @return Response
     */
    public function edit($categoryPermalink, $workPermalink)
    {
        $data = [
            'category'   => Category::where('permalink', $categoryPermalink)->select('id','permalink')->first(),
            'work'       => Work::where('permalink', $workPermalink)->first(),
            'categories' => Category::lists('id', 'name'),
            'changeCategory' => true
        ];

        return view('admin/works/edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param WorksRequest $request
     * @param integer $categoryId
     * @param integer $workId
     * @return Response
     */
    public function update($categoryId, $workId, WorksRequest $request)
    {
        $categoryPermalink = Category::where('id', $categoryId)->pluck('permalink');
        $work = Work::find($workId);

        // Update Object properties
        $work->category_id  = $request->category_id;
        $work->name         = $request->name;
        $work->permalink    = self::urlFriendly($request->permalink,false);
        $work->description  = $request->description;
        $work->image_alt    = $request->image_alt;

        $work->meta_title       = $request->meta_title;
        $work->meta_description = $request->meta_description;
        $work->meta_robots      = $request->meta_robots;

        // Save to database
         $work->save();

        if($request->hasFile('image')):
            $file = $request->file('image');
            $image = \Image::make($file);

            $fileName = self::sanitizeName($file->getClientOriginalName());
            $fileExtension = $file->getClientOriginalExtension();
            $path = public_path('img/portfolio');

            $imageLarge     = self::setSuffix($fileName, $fileExtension, 'large');
            $imageMedium    = self::setSuffix($fileName, $fileExtension, 'medium');
            $imageThumbnail = self::setSuffix($fileName, $fileExtension, 'thumbnail');

            // Remove Large Image
            if(\File::exists($path.'/'.$work->image.'-large.'.$fileExtension)):
                \File::delete($path.'/'.$work->image.'-large.'.$fileExtension);
            endif;

            // Remove Medium Image
            if(\File::exists($path.'/'.$work->image.'-medium.'.$fileExtension)):
                \File::delete($path.'/'.$work->image.'-medium.'.$fileExtension);
            endif;

            // Remove Thumbnail Image
            if(\File::exists($path.'/'.$work->image.'-thumbnail.'.$fileExtension)):
                \File::delete($path.'/'.$work->image.'-thumbnail.'.$fileExtension);
            endif;

            // Large Size
            \Image::make($file)->resize(1280, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$path}/{$imageLarge}");

            // Medium Size
            \Image::make($file)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$path}/{$imageMedium}");

            // Thumbnail Size
            $image->fit(400)->save("{$path}/{$imageThumbnail}");

            // Remove extension to image_path
            $work->image = self::removeExtension($fileName, $fileExtension);

            // Save image name to database
            $work->save();
        endif;

        flash()->success('¡ Bien Hecho !', "Se actualizó el trabajo correctamente");

        return redirect()->route('admin.categories.works.index', $categoryPermalink);
    }

    /**
     * Update resource status
     *
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Request $request, $id)
    {
        $work = Work::where('id',$id)->select('id','category_id','name','active')->first();
        $categoryPermalink = Category::where('id', $work->category_id)->pluck('permalink');

        switch ($work->active) :
            case true:
                $work->active = false;
                $status = 'desactivado';
                break;

            case false:
                $work->active = true;
                $status = 'activado';
                break;
        endswitch;

        $work->save();

        flash()->success('¡ Bien Hecho !', "El trabajo ha sido {$status}");

        return redirect()->route('admin.categories.works.index', $categoryPermalink);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param integer $categoryId
     * @param integer $workId
     * @return Response
     */
    public function destroy($categoryId, $workId)
    {
        $categoryPermalink = Category::where('id',$categoryId)->pluck('permalink');
        $work              = Work::where('id',$workId)->select('id','name','image')->first();

        // Remove Large Image
        if(\File::exists('img/portfolio/'.$work->image.'-large.jpg')):
            \File::delete('img/portfolio/'.$work->image.'-large.jpg');
        endif;

        // Remove Medium Image
        if(\File::exists('img/portfolio/'.$work->image.'-medium.jpg')):
            \File::delete('img/portfolio/'.$work->image.'-medium.jpg');
        endif;

        // Remove Thumbnail Image
        if(\File::exists('img/portfolio/'.$work->image.'-thumbnail.jpg')):
            \File::delete('img/portfolio/'.$work->image.'-thumbnail.jpg');
        endif;

        $work->delete();

        flash()->success('¡ Bien Hecho !', 'Se eliminó el trabajo ('.$work->name.') correctamente');

        return redirect()->route('admin.categories.works.index', $categoryPermalink);
    }
}
