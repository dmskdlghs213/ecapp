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
        // リクエストパラメタにkeywordが入っていたら検索機能を動かす
        if ($request->has('keyword')) {
            // SQLのlike句でitemsテーブルを検索する
            $items = Item::where('name', 'like', '%' . $request->get('keyword') . '%')->paginate(15);
        } else {
            $items = Item::paginate(15);
        }

        // $disk = Storage::disk('s3')->url('//imagebacket/ec_image/s_KzWuSBv0T2KDssB4OanoMw.jpg');

        $disks = Storage::disk('s3')->files('ec_image');

        // if (!empty($disks)) {
        //     $test = "S3と繋がってます";
        // } else {
        //     $test = "S3と繋がってません";
        // }

        // if (!empty($disk)) {
        //     $files = $disk->files('/');
        // }

        return view('item/index', ['items' => $items], ['disks' => $disks]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        return view('item/show', ['item' => $item]);
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
