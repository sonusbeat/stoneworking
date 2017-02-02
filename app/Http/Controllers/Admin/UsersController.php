<?php

namespace Stoneworking\Http\Controllers\Admin;

use Illuminate\Http\Request;

use Stoneworking\Http\Requests;
use Stoneworking\Http\Controllers\Controller;
use Stoneworking\Http\Requests\UsersCreateRequest;
use Stoneworking\Http\Requests\UsersUpdateRequest;
use Stoneworking\Models\User;
use Stoneworking\Traits\ImageTrait;
use Stoneworking\Traits\ModelUtilityTrait;

class UsersController extends Controller
{
    use ImageTrait, ModelUtilityTrait;

    /**
     * UsersController constructor
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display the users list.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::orderBy('name','asc')->get();

        return view('admin/users/index', compact('users'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string $username
     * @return Response
     */
    public function show($username)
    {
        $user = User::where('username',$username)->first();

        return view('admin/users/show', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/users/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersCreateRequest $request)
    {
        $user = new User([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => bcrypt($request->password),
            'type'     => $request->type,
            'active'   => false,
        ]);

        if($request->hasFile('image')):
            $file = $request->file('image');
            $image = \Image::make($file);

            $fileName = self::sanitizeName($file->getClientOriginalName());
            $fileExtension = $file->getClientOriginalExtension();
            $path = public_path('img/users');

            $imageLarge     = self::setSuffix($fileName, $fileExtension, 'large');
            $imageMedium    = self::setSuffix($fileName, $fileExtension, 'medium');
            $imageThumbnail = self::setSuffix($fileName, $fileExtension, 'thumbnail');

            // Large Size
            \Image::make($file)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$path}/{$imageLarge}");

            // Medium Size
            \Image::make($file)->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$path}/{$imageMedium}");

            // Thumbnail Size
            $image->fit(200)->save("{$path}/{$imageThumbnail}");

            $user->image = self::removeExtension($fileName, $fileExtension);
        endif;

        $user->save();

        session()->flash('message', 'Se creó el usuario "'.$user->name.'" satisfactoriamente');

        return redirect()->route('admin.users.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string $username
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $user = User::where('username', $username)->first();

        return view('admin/users/edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdateRequest $request, $id)
    {
        $user = User::find($id);

        $user->name  = $request->name;
        $user->email = $request->email;
        $user->type  = $request->type;

        if($request->password !== ''):
            $user->password = $request->password;
        endif;

        if($request->hasFile('image')):
            $file = $request->file('image');
            $image = \Image::make($file);

            $fileName = self::sanitizeName($file->getClientOriginalName());
            $fileExtension = $file->getClientOriginalExtension();
            $path = public_path('img/users');

            $imageLarge     = self::setSuffix($fileName, $fileExtension, 'large');
            $imageMedium    = self::setSuffix($fileName, $fileExtension, 'medium');
            $imageThumbnail = self::setSuffix($fileName, $fileExtension, 'thumbnail');

            // Remove Large Image
            if(\File::exists($path.'/'.$user->image.'-large.'.$fileExtension)):
                \File::delete($path.'/'.$user->image.'-large.'.$fileExtension);
            endif;

            // Remove Medium Image
            if(\File::exists($path.'/'.$user->image.'-medium.'.$fileExtension)):
                \File::delete($path.'/'.$user->image.'-medium.'.$fileExtension);
            endif;

            // Remove Thumbnail Image
            if(\File::exists($path.'/'.$user->image.'-thumbnail.'.$fileExtension)):
                \File::delete($path.'/'.$user->image.'-thumbnail.'.$fileExtension);
            endif;

            // Large Size
            \Image::make($file)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$path}/{$imageLarge}");

            // Medium Size
            \Image::make($file)->resize(400, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save("{$path}/{$imageMedium}");

            // Thumbnail Size
            $image->fit(200)->save("{$path}/{$imageThumbnail}");

            $user->image = self::removeExtension($fileName, $fileExtension);
        endif;

        $user->save();

        session()->flash('message', 'Se actualizó el usuario "'.$user->name.'" satisfactoriamente');

        return redirect()->route('admin.users.index');
    }

    /**
     * Update resource status
     *
     * @param Request $request
     * @param integer $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function status(Request $request, $id)
    {
        $user = User::where('id',$id)->select('id','name','active')->first();

        switch ($user->active) :
            case true:
                $user->active = false;
                $status = 'desactivado';
                break;

            case false:
                $user->active = true;
                $status = 'activado';
                break;
        endswitch;

        $user->save();

        session()->flash('message', 'El usuario "'.$user->name.'" ha sido '.$status.' satisfactoriamente');

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::where('id',$id)->select('id','name','image')->first();

        // Remove Large Image
        if(\File::exists('img/users/'.$user->image.'-large.jpg')):
            \File::delete('img/users/'.$user->image.'-large.jpg');
        endif;

        // Remove Medium Image
        if(\File::exists('img/users/'.$user->image.'-medium.jpg')):
            \File::delete('img/users/'.$user->image.'-medium.jpg');
        endif;

        // Remove Thumbnail Image
        if(\File::exists('img/users/'.$user->image.'-thumbnail.jpg')):
            \File::delete('img/users/'.$user->image.'-thumbnail.jpg');
        endif;

        $user->delete();

        session()->flash('message', 'El usuario "'.$user->name.'" ha sido eliminado satisfactoriamente');

        return redirect()->route('admin.users.index');
    }
}
