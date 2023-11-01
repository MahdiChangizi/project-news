<?php

namespace App\Repository\Admin\Banner;

interface BannerRepositoryInterface
{
    public function getData();
    public function storeData($request);
    public function updateData();
    public function deleteData();
}
