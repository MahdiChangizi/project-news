<?php

namespace App\Http\Controllers\Admin\Menus;

use App\Http\Controllers\Controller;
use App\Models\Admin\Menu;
use Illuminate\Http\Request;

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
    public function store(Request $request)
    {
        // validation
        $inputs = $request->validate(
        [
            'name' => 'required|min:3|max:20',
            'url' => 'required',
            'parent_id' => 'nullable|exists:menus,id',
        ]);

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
    public function update(Request $request, Menu $menu)
    {
        // validation
        $inputs = $request->validate(
            [
                'name' => 'required|min:3|max:20',
                'url' => 'required',
                'parent_id' => 'nullable|exists:menus,id',
            ]);


                $menu->update($inputs);
                return to_route('admin.menu.index')->with('toast-success' , 'منوی شما با موفقیت ویرایش شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
        return back();
    }
}
