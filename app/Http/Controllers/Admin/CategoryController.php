<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view ('admin.category.index');
    }

    public function add()
    {
        return view ('admin.category.add');
    }

    public function edit($id)
    {
        $category = Category::where('id', $id)->first();

        return view ('admin.category.edit', compact('category'));
    }
}
