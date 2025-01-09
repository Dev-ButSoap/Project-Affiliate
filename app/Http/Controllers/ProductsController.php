<?php

namespace App\Http\Controllers;

use App\Models\Commissions;
use App\Models\Orders;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
  public function index()
  {
    $products = Products::query()->orderBy('id', 'DESC')->get();
    return view('shoping', compact('products'));
  }

  public function order(Request $request)
  {
    $request->validate([
      'product_id' => 'required|exists:products,id',
    ]);

    try {
      $product = Products::find($request->product_id);
      $orders = Orders::create([
        'user_id' => Auth::user()->id,
        'product_ids' => $request->product_id,
        'amount' => $product->price,
        'date' => date('d-m-Y')
      ]);
      // คำนวณค่าคอมมิชชัน
      $this->calculateCommission($orders);

      flash()->success('ซื้อสินค้าสำเร็จ');
      return back();
    } catch (\Throwable $th) {
      throw $th;
      flash()->error('ซื้อสินค้าผิดพลาด');
      return back();
    }
  }

  private function calculateCommission(Orders $order)
  {
    $user = $order->user;
    if ($user->referrer_id) {
      $commission = $order->amount * 0.10;
      if ($user->referrer->referrer_id) {
        $commission = $order->amount * 0.05;
        $tier_1 = User::find($user->referrer->referrer_id);
        Commissions::create([
          'user_id' => $tier_1->id,
          'order_id' => $order->id,
          'amount' => $order->amount * 0.10,
          'date' => $order->date
        ]);
      }
      Commissions::create([
        'user_id' => $user->referrer->id,
        'order_id' => $order->id,
        'amount' => $commission,
        'date' => $order->date
      ]);
    }
  }
}
