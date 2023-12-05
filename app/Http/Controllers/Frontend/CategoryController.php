<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\categoria;

class CategoryController extends Controller
{

    function index()
    {
        $categories = Categoria::all();
        return view('LandingPage.categories.index', compact('categories'));
    }

    function show(Categoria $category)
    {
         
        return view('LandingPage.categories.show', compact('category'));
    }
}
