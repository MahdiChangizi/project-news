<?php

namespace App\Http\Controllers\Admin\Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\SettingUpdateRequest;
use App\Http\Services\Image\ImageService;
use App\Models\Admin\Setting;
use Database\Seeders\SettingSeeder;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $settings = Setting::all();
        if($settings->isEmpty())
        {
            $default = new SettingSeeder();
            $default->run();
            $settings = Setting::all();
        }
        return view('admin.setting.index' , compact('settings'));
    }





    public function edit(Setting $setting)
    {
        return view('admin.setting.set' , compact('setting'));
    }


    public function update(SettingUpdateRequest $request, Setting $setting , ImageService $imageService)
    {
        // validation
        $inputs = $request->all();

        // update
        if($request->hasFile('logo'))
        {
            if(!empty($setting->logo))
            {
                $imageService->deleteImage($setting->logo);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'setting');
            $imageService->setImageName('logo');
            $result = $imageService->save($request->file('logo'));
            if($result === false)
            {
                return redirect()->route('admin.setting.index')->with('toast-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['logo'] = $result;
        }
        if($request->hasFile('icon'))
        {
            if(!empty($setting->icon))
            {
                $imageService->deleteImage($setting->icon);
            }
            $imageService->setExclusiveDirectory('images' . DIRECTORY_SEPARATOR . 'setting');
            $imageService->setImageName('icon');
            $result = $imageService->save($request->file('icon'));
            if($result === false)
            {
                    return redirect()->route('admin.setting.index')->with('toast-error', 'آپلود تصویر با خطا مواجه شد');
            }
            $inputs['icon'] = $result;
        }


        // update setting
        $setting->update($inputs);
        return to_route('admin.setting.index')->with('toast-success' , 'تنظیمات شما با موفقیت ویرایش شد');

    }

}
