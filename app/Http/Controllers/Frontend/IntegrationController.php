<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Option;
use App\Models\OptionGroup;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\MediaCollections\Models\Media;


class IntegrationController extends Controller
{

    public function colors()
    {
        $nodes = DB::connection('mysql2')->table('colors')->where('moved', '0')
            ->join('colors_content', 'colors.id', '=', 'colors_content.colors_id')
            ->select('colors_id', 'color_code', 'title', 'slug', 'status', 'lang_id')->limit(3)->get();
        $arr = [];
        if (count($nodes) > 0) {
            foreach ($nodes as $node) {
                $arr[] = [
                    'id' => $node->colors_id,
                    'color_code' => $node->color_code,
                    'status' => $node->status == 1 ? '1' : '0',
                    'name:' . $node->lang_id => $node->title,
                    'slug:' . $node->lang_id => $node->slug,
                ];
                DB::connection('mysql2')->table('colors')->where('id', $node->colors_id)->update(['moved' => '1']);

            }
            Color::create(Arr::collapse($arr));
        }


        return count($nodes) > 0 ? 'İnteqrasiya tamamlandı' : 'Nəticə boşdur';
    }

    public function categories()
    {
        $nodes = DB::connection('mysql2')->table('category')->where('moved', '0')->where('sub_cat', '<>', null)->orderBy('parent_id', 'asc')
            ->join('category_content', 'category.id', '=', 'category_content.category_id')
            ->select('category_id', 'parent_id', 'sub_cat', 'title', 'slug', 'content', 'status', 'lang_id')->limit(3)->get();
        $arr = [];


        if (count($nodes) > 0) {
            foreach ($nodes as $node) {

                $arr[] = [
                    'id' => $node->category_id,
                    'parent_id' => $node->sub_cat,
                    'status' => $node->status == 1 ? '1' : '0',
                    'name:' . $node->lang_id => $node->title,
                    'slug:' . $node->lang_id => $node->slug,
                    'title:' . $node->lang_id => $node->title,
                    'description:' . $node->lang_id => $node->title,
                    'keywords:' . $node->lang_id => $node->title,
                    'text:' . $node->lang_id => $node->content,
                ];

                DB::connection('mysql2')->table('category')->where('id', $node->category_id)->update(['moved' => '1']);
            }
            Category::create(Arr::collapse($arr));
        }
        return count($nodes) > 0 ? 'İnteqrasiya tamamlandı' : 'Nəticə boşdur';
    }

    public function optionGroups()
    {
        $nodes = DB::connection('mysql2')->table('filters')->where('moved', '0')->get();

        foreach ($nodes as $node) {
            if (count($nodes) > 0) {
                DB::transaction(function () use ($node) {
                    OptionGroup::create([
                        'id' => $node->id,
                        'category_id' => $node->category_id,
                        'name:az' => $node->name,
                        'slug:az' => Str::slug($node->name),
                        'name:en' => '',
                        'slug:en' => '',
                        'name:ru' => '',
                        'slug:ru' => '',
                    ]);
                    DB::connection('mysql2')->table('filters')->where('id', $node->id)->update(['moved' => '1']);
                });
            }

        }

        return count($nodes) > 0 ? 'İnteqrasiya tamamlandı' : 'Nəticə boşdur';

    }

    public function options()
    {
        $nodes = DB::connection('mysql2')->table('filter_options')->where('moved', '0')->get();;
        foreach ($nodes as $node) {
            if (count($nodes) > 0) {
                Option::create([
                    'id' => $node->id,
                    'option_group_id' => $node->parent_id,
                    'name:az' => $node->name,
                    'slug:az' => Str::slug($node->name),
                    'name:en' => '',
                    'slug:en' => '',
                    'name:ru' => '',
                    'slug:ru' => '',
                ]);

                DB::connection('mysql2')->table('filter_options')->where('id', $node->id)->update(['moved' => '1']);

            }

        }

        return count($nodes) > 0 ? 'İnteqrasiya tamamlandı' : 'Nəticə boşdur';

    }

    public function products()
    {
        $nodes = DB::connection('mysql2')->table('product')
            ->where('lang_id', 'az')
            ->where('photo_moved', '0')
            ->join('product_content', 'product.id', '=', 'product_content.product_id')
            ->limit(1)->orderBy('created_at','desc')->get();

        if (count($nodes) > 0) {
            foreach ($nodes as $node) {
                $a = explode('/', $node->img_url);
                $img_url = urldecode($a[count($a) - 1]);
//                DB::transaction(function () use ($node, $img_url) {
                    $product = Product::create([
                        'id' => $node->product_id,
                        'category_id' => $node->cat_id,
                        'brand_id' => $node->brnd_id,
                        'price' => $node->price,
                        'discount_price' => $node->sale_price,
                        'quantity_type' => '1',
                        'status' => $node->status == 1 ? '1' : '0',
                        'name' => $node->title,
                        'slug' => $node->slug,
                        'title:az' => $node->seo_title,
                        'description:az' => $node->seo_desc,
                        'keywords:az' => $node->seo_keyword,
                        'text:az' => $node->content,
                        'title:en' => '',
                        'description:en' => '',
                        'keywords:en' => '',
                        'text:en' => '',
                        'title:ru' => '',
                        'description:ru' => '',
                        'keywords:ru' => '',
                        'text:ru' => '',
                    ]);

                    // upload from Image URL
                    if (!is_null($node->img_url)) {
                        $img_url_path = public_path('uploads/' . urldecode(substr($node->img_url, 23)));
                        if (file_exists($img_url_path)) {
                            $time = Carbon::parse(now())->format('Y/m/d');

                            $media = Media::create([
                                'model_type' => 'App\Models\Product',
                                'model_id' => $product->id,
                                'collection_name' => 'product_images',
                                'name' => $img_url,
                                'file_name' => $img_url,
                                'disk' => 'media',
                                'mime_type' => 'image/jpeg',
                                'size' => '0',
                                'manipulations' => [],
                                'custom_properties' => [],
                                'generated_conversions' => [],
                                'responsive_images' => []
                            ]);

                            $originalPath = public_path('media/' . $time . '/product_images/' . $media->id);

                            if (!file_exists($originalPath)) {
                                mkdir($originalPath, 0755, true);
                            }

                            \File::copy($img_url_path, $originalPath . '/' . $img_url);
                        }

                    }

//                    // upload rom Gallery URL
                    if ($node->gallery != '') {
                        $images = explode(', ', $node->gallery);

                        if (count($images) > 0) {
                            foreach ($images as $image) {
                                $b = explode('/', $image);
                                $gal_url = urldecode($b[count($b) - 1]);

                                $gallery_url_path = public_path('uploads/' . urldecode(substr($image, 23)));

                                if (file_exists($gallery_url_path)) {
                                    $time = Carbon::parse(now())->format('Y/m/d');
                                    if (!empty(substr($image, 30))) {

                                        $media = Media::create(
                                            [
                                                'model_id' => $product->id,
                                                'model_type' => 'App\Models\Product',
                                                'collection_name' => 'product_images',
                                                'name' => $gal_url,
                                                'file_name' => $gal_url,
                                                'disk' => 'media',
                                                'mime_type' => 'image/jpeg',
                                                'size' => '0',
                                                'manipulations' => [],
                                                'custom_properties' => [],
                                                'generated_conversions' => [],
                                                'responsive_images' => []
                                            ]
                                        );

                                        $originalPath = public_path('media/' . $time . '/product_images/' . $media->id);

                                        if (!file_exists($originalPath)) {
                                            mkdir($originalPath, 0755, true);
                                        }

                                        \File::copy($gallery_url_path, $originalPath . '/' . $gal_url);
                                    }
                                }
                            }
                        }
                    }

                    // credit month products
                    $product->credits()->sync([1, 2, 3]);

                    // item_filters for options
                    $options = DB::connection('mysql2')->table('item_filters')->where('item_id', $product->id)->pluck('option_id')->toArray();

                    if (count($options) > 0) {
                        $product->options()->sync($options);
                    }

                    // xref_product_colors for colors
                    $colors = DB::connection('mysql2')->table('xref_product_colors')->where('product_id', $product->id)->pluck('colors_id')->toArray();

                    if (count($colors) > 0) {
                        $product->colors()->sync($colors);
                    }

                    DB::connection('mysql2')->table('product')->where('id', $node->product_id)->update(['moved' => '1']);
                }

//                });

        }
        return count($nodes) > 0 ? 'İnteqrasiya tamamlandı' : 'Nəticə boşdur';
    }


    public function photos()
    {
        $nodes = DB::connection('mysql2')->table('product')
            ->where('lang_id', 'az')
            ->where('photo_moved', '0')
            ->join('product_content', 'product.id', '=', 'product_content.product_id')
            ->limit(1)->orderBy('created_at','desc')->get();

        if (count($nodes) > 0) {
            foreach ($nodes as $node) {
                if (!Media::where('model_type', 'App\Models\Product')->where('collection_name', 'product_images')->where('model_id', $node->product_id)->exists()) {
                $a = explode('/', $node->img_url);

                $img_url = urldecode($a[count($a) - 1]);

                $product = Product::where('id', $node->product_id)->first();

                // upload from Image URL
                if (!is_null($node->img_url)) {
                    $img_url_path = public_path('uploads/' . urldecode(substr($node->img_url, 23)));
                    if (file_exists($img_url_path)) {
                        $time = Carbon::parse(now())->format('Y/m/d');

                        $media = Media::updateOrCreate(
                            [
                                'model_type' => 'App\Models\Product',
                                'model_id' => $product->id,
                                'collection_name' => 'product_images',
                            ],
                            [
                                'name' => $img_url,
                                'file_name' => $img_url,
                                'disk' => 'media',
                                'mime_type' => 'image/jpeg',
                                'size' => '0',
                                'manipulations' => [],
                                'custom_properties' => [],
                                'generated_conversions' => [],
                                'responsive_images' => []
                            ]);

                        $originalPath = public_path('media/' . $time . '/product_images/' . $media->id);

                        if (!file_exists($originalPath)) {
                            mkdir($originalPath, 0755, true);
                        }

                        \File::copy($img_url_path, $originalPath . '/' . $img_url);
                    }

                }

                // upload rom Gallery URL
                if ($node->gallery != '') {
                    $images = explode(', ', $node->gallery);

                    if (count($images) > 0) {
                        foreach ($images as $image) {
                            $b = explode('/', $image);
                            $gal_url = urldecode($b[count($b) - 1]);

                            $gallery_url_path = public_path('uploads/' . urldecode(substr($image, 23)));

                            if (file_exists($gallery_url_path)) {
                                $time = Carbon::parse(now())->format('Y/m/d');
                                if (!empty(substr($image, 30))) {

                                    $media = Media::updateOrCreate(
                                        [
                                            'model_id' => $product->id,
                                            'model_type' => 'App\Models\Product',
                                            'collection_name' => 'product_images',
                                        ],
                                        [
                                            'name' => $gal_url,
                                            'file_name' => $gal_url,
                                            'disk' => 'media',
                                            'mime_type' => 'image/jpeg',
                                            'size' => '0',
                                            'manipulations' => [],
                                            'custom_properties' => [],
                                            'generated_conversions' => [],
                                            'responsive_images' => []
                                        ]
                                    );

                                    $originalPath = public_path('media/' . $time . '/product_images/' . $media->id);

                                    if (!file_exists($originalPath)) {
                                        mkdir($originalPath, 0755, true);
                                    }

                                    \File::copy($gallery_url_path, $originalPath . '/' . $gal_url);
                                }
                            }
                        }
                    }
                }

                DB::connection('mysql2')->table('product')->where('id', $node->product_id)->update(['photo_moved' => '1']);

                }

            }

        }
        return count($nodes) > 0 ? 'İnteqrasiya tamamlandı' : 'Nəticə boşdur';
    }


}
