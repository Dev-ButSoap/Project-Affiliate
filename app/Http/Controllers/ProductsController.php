<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
  public function index()
  {
    $products = Products::query()->orderBy('id', 'DESC')->get();
    return view('products', compact('products'));
  }
}
