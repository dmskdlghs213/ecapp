<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\User;
use App\Mail\Buy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Transaction;
use Illuminate\Support\Facades\Mail;

class BuyController extends Controller
{
    public function index()
    {

        //　カートのアイテム一覧を表示させる
        $cartitems = CartItem::select('cart_items.*', 'items.name', 'items.amount')
            ->where('user_id', Auth::id())
            ->join('items', 'items.id', '=', 'cart_items.item_id')
            ->get();

        //　カートの中の合計額を計算する
        $subtotal = 0;

        foreach ($cartitems as $cartitem) {
            $subtotal += $cartitem->amount * $cartitem->quantity;
        }

        return view('buy/index', ['cartitems' => $cartitems], ['subtotal' => $subtotal]);
    }

    //郵送先情報の一時保存

    public function store(Request $request)
    {
        if ($request->has('post')) {
            Mail::to(Auth::user()->email)->send(new Buy());

            //　カートアイテムからuser_idを紐づけてfindall()。どのユーザーがどの商品を何個購入したかをTransactionテーブルに突っ込む
            

            // Auth::updateOnCreate(
            //     [
            //         'postalcode' => 'postalcode',
            //         'region' => 'region',
            //         'address' => 'addressline',
            //         'phonenumber' => 'phonenumber',    
            //     ]
            //     );


            // $transaction = new Transaction();
            // $transaction->order_id++;
            // $transaction->user_id = Auth::id();
            // $transaction->item_id = CartItem::select('item_id')
            // ->where('user_id',Auth::id())->get();
            // $transaction->quantity = $request->post('quantity');
            // $transaction->save();

            CartItem::where('user_id', Auth::id())->delete();

            return view('buy/complete');
        }
        $request->flash();
        return $this->index();

    }
}
