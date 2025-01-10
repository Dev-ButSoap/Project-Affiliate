<?php

namespace App\Http\Controllers;

use App\Models\Commissions;
use Illuminate\Http\Request;
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
    dd($commissions);
    return DataTables::of()
      ->addIndexColumn()
      ->toJson();
  }
}
