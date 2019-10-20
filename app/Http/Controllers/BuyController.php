<?php

namespace App\Http\Controllers;

use App\CartItem;
use App\User;
use App\Transaction;
use App\Mail\Buy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


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
            // Mail::to(Auth::user()->email)->send(new Buy());

            // $transaction = DB::table('transaction')->insert([

            //     'user_id' => Auth::id(),
            //     'items_id' => $request('post')->id(),

            // ]); 

            Auth::user()->update(
                [
                    'postalcode' => request('postalcode'),
                    'region' => request('region'),
                    'address' => request('addressline'),
                    'phonenumber' => request('phonenumber'),
                ]
            );


            //カートに入っているアイテムIDをrequestで取得して変数に格納
            $itemnumbers = request('cart_item_id');

            //カートに入っているアイテムの個数をrequestで取得して変数に格納
            $itemmounts = request('quantity');

            //配列から一件づつ取得するため繰り返し処理
            foreach($itemmounts as $itemmount){
                $quantity = $itemmount;
            }

            // order_idの割り当て
            $transactions = request('order_id');

            foreach($transactions as $transaction){
                $order_id = $transaction;
            }


            foreach ($itemnumbers as $itemnumber) {
                $item_id = $itemnumber;
                $tr = new Transaction();
                $tr->order_Id = $order_id;
                $tr->user_id = Auth::id();
                $tr->item_id = $item_id;
                $tr->quantity = $quantity;
                $tr->save();
            }

            

            CartItem::where('user_id', Auth::id())->delete();

            return view('buy/complete');
        }
        $request->flash();
        return $this->index();
    }
}
