<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Product;

class ProductController extends Controller
{
    public function index()
    {
        return view ('admin.product.index');
    }

    public function add()
    {
        return view ('admin.product.add');
    }
}
