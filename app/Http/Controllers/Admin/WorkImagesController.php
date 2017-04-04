<?php

namespace Stoneworking\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Image;
use Stoneworking\Http\Requests;
use Stoneworking\Http\Controllers\Controller;
use Stoneworking\Models\Category;
use Stoneworking\Models\Work;
use Stoneworking\Models\WorkImage;
use Stoneworking\Traits\ImageTrait;
use Stoneworking\Traits\ModelUtilityTrait;

class WorkImagesController extends Controller
{
    use ImageTrait, ModelUtilityTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($workId)
    {
        $work = Work::where('id',$workId)->select('id','category_id','permalink')->first();
        $category = Category::where('id',$work->category_id)->select('permalink')->first();

        return view('admin.work-images.create', compact('category','work'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $workId)
    {
        $work = Work::where('id',$workId)->select('id','category_id','permalink')->first();
        $category = Category::where('id',$work->category_id)->select('permalink')->first();

        if($request->hasFile('image')):
            $file = $request->image;
            $image = Image::make($file);

            $fileName = self::sanitizeName($file->getClientOriginalName());
            $fileExtension = $file->getClientOriginalExtension();
            $path = public_path('img/portfolio/work-images');

            $imageLarge     = $workId.'-'.self::setSuffix($fileName, $fileExtension, 'large');
            $imageMedium    = $workId.'-'.self::setSuffix($fileName, $fileExtension, 'medium');
            $imageThumbnail = $workId.'-'.self::setSuffix($fileName, $fileExtension, 'thumbnail');

            // Large Size
            Image::make($file)->resize(1280, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$path}/{$imageLarge}");

            // Medium Size
            Image::make($file)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$path}/{$imageMedium}");

            // Thumbnail Size
            $image->fit(400)->save("{$path}/{$imageThumbnail}");

            // Save the image to database
            WorkImage::create([
                'work_id' => $workId,
                'name'    => $workId.'-'.self::removeExtension($fileName, $fileExtension),
                'alt'     => $request->alt
            ]);

            flash()->success('¡ Bien Hecho !', 'Se agregó la imagen correctamente');

            return redirect()->route('admin.categories.works.show', [
                $category->permalink,
                $work->permalink
            ]);
        endif;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($workId, $imageId)
    {
        $image = WorkImage::find($imageId);
        $work = Work::where('id',$workId)->select(['id','category_id','permalink'])->first();
        $category = Category::where('id',$work->category_id)->select('permalink')->first();

        return view('admin.work-images.edit', compact('category','work','image'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int $workId
     * @param  int $imageId
     * @return Response
     */
    public function update(Request $request, $workId, $imageId)
    {
        $work = Work::where('id',$workId)->select('id','category_id','permalink')->first();
        $category = Category::where('id',$work->category_id)->select('permalink')->first();
        $workImage = WorkImage::where('id',$imageId)->first();

        // Update Object
        $workImage->update(['alt' => $request->alt]);

        if($request->hasFile('image')):
            $file = $request->image;
            $image = Image::make($file);

            $fileName = self::sanitizeName($file->getClientOriginalName());
            $fileExtension = $file->getClientOriginalExtension();
            $path = public_path('img/portfolio/work-images');

            $imageLarge     = $workId.'-'.self::setSuffix($fileName, $fileExtension, 'large');
            $imageMedium    = $workId.'-'.self::setSuffix($fileName, $fileExtension, 'medium');
            $imageThumbnail = $workId.'-'.self::setSuffix($fileName, $fileExtension, 'thumbnail');

            // Remove Large Image
            if(\File::exists($path.'/'.$workImage->name.'-large.'.$fileExtension)):
                \File::delete($path.'/'.$workImage->name.'-large.'.$fileExtension);
            endif;

            // Remove Medium Image
            if(\File::exists($path.'/'.$workImage->name.'-medium.'.$fileExtension)):
                \File::delete($path.'/'.$workImage->name.'-medium.'.$fileExtension);
            endif;

            // Remove Thumbnail Image
            if(\File::exists($path.'/'.$workImage->name.'-thumbnail.'.$fileExtension)):
                \File::delete($path.'/'.$workImage->name.'-thumbnail.'.$fileExtension);
            endif;

            // Large Size
            Image::make($file)->resize(1280, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$path}/{$imageLarge}");

            // Medium Size
            Image::make($file)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$path}/{$imageMedium}");

            // Thumbnail Size
            $image->fit(400)->save("{$path}/{$imageThumbnail}");

            // Save the image to database
            $workImage->update([
                'name' => $workId.'-'.self::removeExtension($fileName, $fileExtension)
            ]);
        endif;

        flash()->success('¡ Bien Hecho !', 'Se actualizó la imagen correctamente');

        return redirect()->route('admin.categories.works.show', [
            $category->permalink,
            $work->permalink
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($workId, $imageId)
    {
        $image = WorkImage::where('id',$imageId)->select('id','name')->first();
        $work = Work::where('id',$workId)->select(['category_id','permalink'])->first();
        $category = Category::where('id',$work->category_id)->select(['permalink'])->first();

        // Remove Large Image
        if(\File::exists("img/portfolio/work-images/{$image->name}-large.jpg")):
            \File::delete("img/portfolio/work-images/{$image->name}-large.jpg");
        endif;

        // Remove Medium Image
        if(\File::exists("img/portfolio/work-images/{$image->name}-medium.jpg")):
            \File::delete("img/portfolio/work-images/{$image->name}-medium.jpg");
        endif;

        // Remove Thumbnail Image
        if(\File::exists("img/portfolio/work-images/{$image->name}-thumbnail.jpg")):
            \File::delete("img/portfolio/work-images/{$image->name}-thumbnail.jpg");
        endif;

        $image->delete();

        flash()->success('¡ Bien Hecho !', 'Se eliminó la imagen correctamente');

        return redirect()->route('admin.categories.works.show', [
            $category->permalink,
            $work->permalink
        ]);
    }
}
