<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeleteUpload;
use App\Http\Requests\Admin\UploadImage;
use App\Models\Folder;
use App\Models\Image;
use Illuminate\Http\Request;

class UploadsController extends Controller
{
    /**
     * Upload a image.
     *
     * @param Session $session
     * @param UploadImage $request
     * @param Folder $folder
     *
     * @return JsonResponse
     *
     * @throws Throwable
     */
    public function image(Session $session, UploadImage $request, Folder $folder)
    {
        $image = $request->file('file');

        if (! $image->isValid()) {
            return static::abort($request);
        }

        $filename   = static::name();
        $clientName = $image->getClientOriginalName();
        $extension  = $image->getClientOriginalExtension();

        ini_set('memory_limit', '256M');

        $originaldestinationPath = public_path('/image');
        $file = $filename.'.'.$extension;
        $image->move($originaldestinationPath, $file);
        if (!file_exists($originaldestinationPath)) {
            mkdir($originaldestinationPath, 755, true);
        }
        $image = ImageLib::make($img=$originaldestinationPath.'/'.$file)->resize(1920,null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        })->save($originaldestinationPath.'/'.$file);
        $image->destroy();

        $len  = strlen($extension);
        $name = substr($clientName, 0, -++$len);
        $data = compact('filename', 'extension');

        foreach (config('translatable.locales') as $locale) {
            $data['name:'.$locale] = $name;
        }

        if (! $image = $folder->images()->create($data)) {
//            Storage::delete($img);

            return static::abort($request);
        }

        $data = [
            'index'  => $request->index,
            'image'  => view('admin.images.image', $data = [
                'image'   => $image,
                'locales' => config('laravellocalization.supportedLocales'),
                'locale'  => $session->get('locale'),
            ])->render(),
            'update' => view('admin.images.edit.update', $data)->render(),
            'delete' => view('admin.images.edit.delete', $data)->render(),
        ];

        return response()->json($request->index ? $data : ['link' => $image->url] + $data);
    }

    /**
     * Delete the uploaded file.
     *
     */
    public function delete(DeleteUpload $request)
    {
        if ($image = Image::get($file = $request->file)) {
            $image->delete();

            Storage::delete('images'.DIRECTORY_SEPARATOR.$file);
        }
    }

    /**
     * Abort if upload failed.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return JsonResponse
     */
    private static function abort(Request $request)
    {
        return response()->json([
            'error' => __('files.upload_failed'),
            'index' => $request->index,
        ]);
    }

    /**
     * Generate a unique name.
     *
     * @return string
     */
    private static function name()
    {
        return md5(uniqid(mt_rand()));
    }
}
