<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        return Inertia::render('Category',[
            'category_name'=>Category::find($id),
            'category_by_id'=>Product::where('category',$id)->get()
        ]);
    }

    
}
