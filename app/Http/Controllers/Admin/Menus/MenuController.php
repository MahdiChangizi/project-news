<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Menu\MenuStoreRequest;
use App\Http\Requests\Admin\Menu\MenuUpdateRequest;
use App\Models\Admin\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $parents = Menu::whereNull('parent_id')->get();
        return view('admin.menus.create' , compact('parents'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuStoreRequest $request)
    {
        // validation
        $inputs = $request->all();

        // create
        $menus = Menu::create($inputs);
        return to_route('admin.menu.index')->with('toast-success' , 'منوی شما با موفقیت اضافه شد');
    }




    public function edit(Menu $menu)
    {
        $parents = Menu::whereNot('id' , $menu->id)->get();
        return view('admin.menus.edit' , compact('parents' ,'menu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuUpdateRequest $request, Menu $menu)
    {
        // validation
        $inputs = $request->all();

        $menu->update($inputs);
        return to_route('admin.menu.index')->with('toast-success' , 'منوی شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back()->with('toast-success' , 'منوی شما با موفقیت حذف شد');
    }
}
