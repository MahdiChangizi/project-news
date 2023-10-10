<?php

namespace App\Repository\Admin\Category;

use App\Models\Admin\Category;

class CategoryRepository implements CategoryInterface {

    public function getAll()
    {
        return Category::all();
    }

}