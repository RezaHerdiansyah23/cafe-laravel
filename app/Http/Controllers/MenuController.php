<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu; // Tambahkan ini

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }

    public function create()
    {
        return view('menus.create');
    }

    public function store(Request $request)
    {
        $menu = new Menu;
        $menu->description = $request->description;
        $menu->price = $request->price;
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $menu->image = $filename;
        }
        
        $menu->save();
        return redirect()->route('menus.index');
    }

    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('menus.edit', compact('menu'));
    }

    public function update(Request $request, $id)
    {
        \Log::info('Update request data:', $request->all());

        $menu = Menu::find($id);
        $menu->description = $request->description;
        $menu->price = $request->price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $menu->image = $filename;
        }

        $menu->save();
        return redirect()->route('menus.index');
    }

    public function destroy($id)
    {
        $menu = Menu::find($id);
        $menu->delete();
        return redirect()->route('menus.index');
    }

    public function order()
{
    $menus = Menu::all();
    return view('menus.order', compact('menus'));
}
}