<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class OrdersController extends Controller
{
  public function index()
  {
    return view('orders');
  }

  public function dataTable()
  {
    $orders = Orders::where('user_id', Auth::user()->id)->orderby('created_at', 'DESC')->get();
    return DataTables::of($orders)
      ->addIndexColumn()
      ->editColumn('date', function ($data) {
        $date = Carbon::parse($data->date)->format('d/m/Y');
        return $date;
      })
      ->addColumn('product', function ($data) {
        return $data->product->product;
      })
      ->addColumn('price', function ($data) {
        return $data->product->price;
      })
      ->toJson();
  }
}
