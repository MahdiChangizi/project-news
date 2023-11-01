<?php

namespace App\Repository\Admin\Banner;

use App\Models\Admin\Banner;
use App\Repository\Admin\Banner\BannerRepositoryInterface;

class BannerRepository implements BannerRepositoryInterface
{

    public function getData()
    {
        return Banner::all();
    }

    public function storeData(request $request)
    {
        Banner::create($request->all());
    }

    public function updateData()
    {
        // TODO: Implement updateData() method.
    }

    public function deleteData()
    {
        // TODO: Implement deleteData() method.
    }
}
