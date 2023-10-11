<?php

namespace App\Repository\Admin\User;

use App\Models\User;

class UserRepository implements UserInterface {

    public function getAll()
    {
        return User::all();
    }

}