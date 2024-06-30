<?php

namespace App\Repository\Admin\Banner;

use App\Models\Admin\Banner;
use App\Repository\Admin\Banner\BannerRepositoryInterface;
use Illuminate\Support\Facades\Request;

class BannerRepository implements BannerRepositoryInterface
{

    public function getData()
    {
        return Banner::all();
    }

    public function storeData($request): void
    {
        Banner::create($request->all());
    }

    public function updateData()
    {
        // TODO: Implement updateData() method.
    }

    public function deleteData($banner): void
    {
        $banner->delete();
    }
}
