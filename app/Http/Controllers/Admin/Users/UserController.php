<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->simplePaginate(15);

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserUpdateRequest $request, User $user)
    {
        $inputs = $request->all();
        $inputs['password'] = Hash::make($inputs['password']);

        $result = $user->update($inputs);
        if ($result == true) {
            return to_route('admin.user.index')->with('toast-success', 'کاربر شما با موفقیت ویرایش شد');
        } else {
            return to_route('admin.user.index')->with('toast-error', 'کاربر شما با موفقیت ویرایش نشد');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return to_route('admin.user.index')->with('toast-success', 'کاربر شما با موفقیت حذف شد');
    }

    public function change(User $user)
    {
        if ($user['permission'] == 'user') {
            $user['permission'] = 'admin';
            $user->save();

            return to_route('admin.user.index')->with('toast-success', 'کاربر شما با موفقیت مدیر شد');
        } elseif ($user['permission'] == 'admin') {
            $user['permission'] = 'user';
            $user->save();

            return to_route('admin.user.index')->with('toast-success', 'کاربر شما با موفقیت از مدیر بودن خارج شد');
        }
    }
}
