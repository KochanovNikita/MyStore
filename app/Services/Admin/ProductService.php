<?php

namespace App\Services\Admin;

use App\Models\Image;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public static function store($data) {
        try {
            DB::beginTransaction();
            $subcategories = $data['subcategories'];
            $images = $data['images'];
            unset($data['subcategories'], $data['images']);

            $data['preview_image'] = self::saveImage($data['main_image'], 'products', true);
            $data['main_image'] = self::saveImage($data['main_image'], 'products');

            $product = Product::create($data);

            foreach ($images as $image) {
                $bigImage = self::saveImage($image, 'products');
                $smallImage = self::saveImage($image, 'products', true);
                Image::create([
                    'product_id' => $product->id,
                    'image' => $bigImage,
                    'preview_image' => $smallImage,
                ]);
            }

            $product->subcategories()->attach($subcategories);

            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->route('admin.product.create')->withErrors('Произошла ошибка', 'field');
        }
    }

    public static function update($product, $data) {
        try {
            DB::beginTransaction();
            $subcategories = $data['subcategories'];

            if(isset($data['images'])) {
                $product->images()->delete();
                $images = $data['images'];

                unset($data['images']);

                foreach ($images as $image) {
                    $bigImage = self::saveImage($image, 'products');
                    $smallImage = self::saveImage($image, 'products', true);
                    Image::create([
                        'product_id' => $product->id,
                        'image' => $bigImage,
                        'preview_image' => $smallImage,
                    ]);
                }
            }

            unset($data['subcategories']);

            if(isset($data['main_image'])) {
                $data['preview_image'] = self::saveImage($data['main_image'], 'products', true);
                $data['main_image'] = self::saveImage($data['main_image'], 'products');
            } else {
                $data['preview_image'] = $product->preview_image;
                $data['main_image'] = $product->main_image;
            }

            $product->update($data);
            $product->subcategories()->sync($subcategories);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            return redirect()->route('admin.product.edit', $product)->withErrors('Произошла ошибка', 'field');
        }
    }

    private static function saveImage($input, $dir, $isPreview = false) {
        $height = 600;
        $width = 400;

        self::dirExist($dir);

        $fileName = md5(Carbon::now().'_'.$input->getClientOriginalName()).'.'.$input->getClientOriginalExtension();

        if($isPreview) {
            $fileName = 'prev_'.$fileName;
            $height = 240;
            $width = 180;
        }
        $path = $dir.'/'.$fileName;

        \Intervention\Image\Facades\Image::make($input)
            ->fit($width, $height)
            ->save(storage_path('app/public/images/'.$path));
        return 'images/'.$path;
    }

    private static function dirExist($dir) {
        $path = $path = storage_path('app/public/images/'.$dir);
        if (!file_exists($path)) {
            mkdir($path);
        }
    }
}
