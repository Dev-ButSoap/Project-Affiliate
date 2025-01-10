<?php

namespace App\Http\Controllers;

use App\Models\Commissions;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class CommissionsController extends Controller
{
  public function index()
  {
    return view('commission');
  }

  public function dataTable()
  {
    $commissions = Commissions::where('user_id', Auth::user()->id)->orderby('created_at', 'DESC')->get();
    return DataTables::of($commissions)
      ->addIndexColumn()
      ->editColumn('date', function ($data) {
        $date = Carbon::parse($data->date)->format('d/m/Y');
        return $date;
      })
      ->addColumn('name', function ($data) {
        return $data->order->user->name;
      })
      ->addColumn('product', function ($data) {
        return $data->order->product->product;
      })
      ->addColumn('price', function ($data) {
        return $data->order->product->price;
      })
      ->toJson();
  }
}
