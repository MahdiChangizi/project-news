<?php

namespace App\Http\Controllers\Admin\Banners;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Banner\BannerStoreRequest;
use App\Http\Requests\Admin\Banner\BannerUpdateRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Admin\Banner;


class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $banners = Banner::all();
        return view('admin.banners.index' , compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BannerStoreRequest $request , ImageService $imageService)
    {
        // validation
        $inputs = $request->all();

        // save image in public
        if($request->hasFile('image'))
        {
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'Banners');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return redirect()->route('admin.banner.index')->with('toast-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }

        // create Banner
        $banner = Banner::create($inputs);
        return to_route('admin.banner.index')->with('toast-success' , 'بنر شما با موفقیت اضافه شد');

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit' , compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BannerUpdateRequest $request, ImageService $imageService , Banner $banner)
    {
        $inputs = $request->all();

        // save image in public
        if ($request->hasFile('image')) {
            if (!empty($banner->image)) {
                $imageService->deleteDirectoryAndFiles($banner->image['directory']);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'Banners');
            $result = $imageService->createIndexAndSave($request->file('image'));
            if ($result === false) {
                return to_route('admin.banner.index')->with('toast-alert', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['image'] = $result;
        }
        else
        {
            if (isset($inputs['currentImage']) && !empty($banner->image)) {
                $image = $banner->image;
                $image['currentImage'] = $inputs['currentImage'];
                $inputs['image'] = $image;
            }
        }

        // update Banner
        $banner->update($inputs);
        return to_route('admin.banner.index')->with('toast-success' , 'بنر شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back();
    }
}

