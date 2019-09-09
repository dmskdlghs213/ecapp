<?php

namespace App\Http\Controllers;

use App\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //カートアイテム一覧表示
        $cartitems = CartItem::select('cart_items.*','items.name','items.amount')
        ->where('user_id',Auth::id()) //ログイン中のユーザーのユーザーIDがキー
        ->join('items','items.id','=','cart_items.item_id' )
        ->get();

        //カートの中身の合計金額表示
        $subtotal = 0;
        foreach($cartitems as $cartitem){
            $subtotal += $cartitem->amount * $cartitem->quantity; 
        }

        
        return view('cartitem/index',['cartitems' => $cartitems,'subtotal' => $subtotal]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo $request->post('quantity');
        CartItem::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'item_id' => $request->post('item_id'),
                'quantity' => \DB::raw('quantity + ' . $request->post('quantity')),
            ]
        );
        return redirect('/')->with('flash_message','カートにアイテムを追加しました');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function show(CartItem $cartItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function edit(CartItem $cartItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartItem $cartItem)
    {
        $cartItem->quantity = $request->post('quantity');
        $cartItem->save();
        return redirect('cartitem')->with('flash_message','カートの中身を更新しました');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartItem $cartItem,Request $request)
    {
        $cartItem->delete();
        return redirect('cartitem')->with('flash_message','カートの中身を削除しました');
    }
}



