<?php

namespace App\Traits;

use Exception;
use Illuminate\Support\Facades\File as BaseFile;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

trait File
{
    public function image($path)
    {
        return '<img alt="" src="' .$path. '">';
    }

	public function upload($path, $file)
    {
        try
        {
			$uploadPath = public_path("uploads/$path");

			if (! BaseFile::exists($uploadPath))
			{
				BaseFile::makeDirectory($uploadPath, 0777, true);
            }

			$fileName = uniqid() . '.' . Str::lower($file->extension());
            $file->move($uploadPath, $fileName);

            return "$path/$fileName";
        }

        catch (Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
            return back()->withError(trans('backend.messages.error.upload'));
        }
    }

    public function multiUpload($path, $files = [])
    {
        try
        {
            $result = [];

            foreach ($files as $file)
            {
                $name = uniqid() . '.' . Str::lower($file->extension());
                $file->move(public_path("uploads/$path"), $name);
                $result[] = "$path/$name";
            }

            return $result;
        }

        catch (Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
            return back()->withError(trans('backend.messages.error.multi_upload'));
        }
    }

    public function delete($file)
    {
        try
        {
            if (BaseFile::exists(public_path("uploads/$file")))
            {
                BaseFile::delete(public_path("uploads/$file"));
            }
        }

        catch (Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
        }
    }

    public function multiDelete($files = [])
    {
        try
        {
            foreach ($files as $file)
            {
                if (BaseFile::exists(public_path("uploads/$file")))
                {
                    BaseFile::delete(public_path("uploads/$file"));
                }
            }
        }

        catch (Exception $e)
        {
            Log::channel('backend')->error($e->getMessage());
        }
    }
}
