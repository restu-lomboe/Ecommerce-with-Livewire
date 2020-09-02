<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Brand;

class BrandController extends Controller
{
    public function index()
    {
        return view ('admin.brand.index');
    }

    public function add()
    {
        return view ('admin.brand.add');
    }

    public function edit($id)
    {
        $brand = Brand::where('id', $id)->first();

        return view ('admin.brand.edit', compact('brand'));
    }
}
