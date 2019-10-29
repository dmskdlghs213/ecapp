<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // $all_items = Item::all();

        // リクエストパラメタにkeywordが入っていたら検索機能を動かす
        if ($request->has('keyword')) {
            // SQLのlike句でitemsテーブルを検索する
            $items = Item::where('name', 'like', '%' . $request->get('keyword') . '%')->paginate(12);
        } else {

            if ($request->has('cheese')) {
                $item_name = "チーズ";
                $items = Item::where('name', 'like', '%' . $item_name . '%')->paginate(12);
            } else {

                if ($request->has('demiglace')) {
                    $item_name = "デミグラス";
                    $items = Item::where('name', 'like', '%' . $item_name . '%')->paginate(12);
                } else {

                    if ($request->has('cream')) {
                        $item_name = "クリーム";
                        $items = Item::where('name', 'like', '%' . $item_name . '%')->paginate(12);
                    } else {
                        if ($request->has('japan')) {
                            $item_name = "明太";
                            $items = Item::where('name', 'like', '%' . $item_name . '%')->paginate(12);
                        } else {
                            $items = Item::paginate(12);
                        }
                    }
                }
            }
        }

       
        // $disks = Storage::disk('s3')->files('ec_image');
        // if (!empty($disks)) {
        //     $test = "S3と繋がってます";
        // } else {
        //     $test = "S3と繋がってません";
        // }

        return view('item/index', ['items' => $items]);
    }


    public function category()
    { }




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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function item_detail(Item $item)
    {
        $recomend_items = Item::inRandomOrder()->paginate(2);

        return view('item/show', ['item' => $item], ['recomend_items' => $recomend_items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    { }
}
