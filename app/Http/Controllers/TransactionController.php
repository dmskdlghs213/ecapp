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
        $item_list = Item::select('items.name', 'items.amount')
            ->where('transaction.user_id', Auth::id())
            ->join('transaction', 'transaction.item_id', '=', 'items.id')
            ->get();

        return view('item.transaction', ['items' => $item_list]);
    }
}
