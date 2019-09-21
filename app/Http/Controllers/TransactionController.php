<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Transaction;
use App\Item;
use Illuminate\Support\Facades\Auth;


class TransactionController extends Controller
{

    public function index()
    {

        // $transaction = Transaction::select('transaction.*', 'items.name', 'items.amount')
        //     ->where('user_id', Auth::id())
        //     ->join('items', 'items.id', '=', 'transaction.item_id')
        //     ->get();



        // return view('item.transaction', ['transaction' => $transaction]);


        // $transaction = Item::select('');
        // $confirm = Auth::id();
        // Transaction::select('user_id')

        // 　文字化けするやつ
        $item_list = Item::select('items.name', 'items.amount')
            ->where('transaction.user_id', Auth::id())
            ->join('transaction', 'transaction.item_id', '=', 'items.id')
            ->get();

        return view('item.transaction', ['items' => $item_list]);
    }
}
