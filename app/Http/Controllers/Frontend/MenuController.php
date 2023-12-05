<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\producto;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Menu;
use Cart;

class MenuController extends Controller
{
    function index()
    {
        $Products = Producto::all();
        return view('LandingPage.menus.index', compact('Products'));
    }


    function update(Request $request ,string $id){
        $Products = Producto::find($id);
        if(empty($Products))
            return redirect('/menus');
        Cart::add(
            $Products->id,
            $Products->nombre,
            $request->cantidad,
            $Products->precio,      
            ['imagen'=>$Products->imagen], 
        );
        // return redirect()->route('menu.index'); 
        return back();   
    }

    function main()
    {
        $comments = Comment::latest()->take(3)->with('user')->get(); 
        $menu = Menu::findOrfail(1);
        $specials = $menu->productos;

        if($comments->count() == 0){
        $comments = null;
        }
        if($specials->count() == 0){
        $specials = null;       
        }

        return view('welcome', compact('comments','specials'));
    }

}
