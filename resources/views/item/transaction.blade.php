@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="/css/transaction.css">


<div class="container">
    <div class="row justify-content-center">
        <h2>＜購入商品一覧＞</h2>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-10">
            <div class="card">
                <div class="col-md-10">
                    <div class="card-body">
                        @foreach($items as $item)
                        <div class="item">
                            <a>商品名：{{ $item->name }}</a>
                            <br>
                            <a>購入金額：{{ $item->amount }}円</a>
                            <br>
                            <br>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





@endsection