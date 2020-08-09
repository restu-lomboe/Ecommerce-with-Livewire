<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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

    // public function post(Request $request)
    // {
    //     $data = $request->all();
    //     dd($data);
    // }
}
