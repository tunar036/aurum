<?php

namespace App\Services\MediaLibrary;

class UploadImageService
{
   public function upload($model, $request, $collectionName, $multiple=true, $responsive=false){
       try{
           if ($multiple) {
               $model->addMultipleMediaFromRequest(['image'])->each(function ($fileAdder) use ($collectionName , $responsive){
                   $fileAdder
                       ->withResponsiveImagesIf($responsive)
                       ->toMediaCollection($collectionName);
               });
           }
           else {
               $model->addMediaFromRequest($request)
                     ->withResponsiveImagesIf($responsive)
                     ->toMediaCollection($collectionName);
           }

       }
       catch (\Exception $e){
           return redirect()->back()->withErrors($e->getMessage())->withInput();
       }
   }
}
