@extends('layouts.app')

@section('content')

<link rel="stylesheet" href="/css/show.css">

<div class="container">
    <div class="row item_name">
        <div class="col-md-5">
            <h2>{{ $item->name }}</h2>
        </div>
    </div>

    <div class="row justify-content-center top">

        <div class="col-md-5">
            <img href="/item/{{ $item->id }}" src="https://imagebacket.s3-ap-northeast-1.amazonaws.com/{{ $item->image_path }}" alt="">
        </div>

        <div class="col-md-5 col-sm-3">
            <div class="card">
                <div class="card-body">
                    <p>{{ $item->amount }}円</p>
                </div>
                @auth
                <form action="cartitem" method="post" class="form-inline m-1">
                    {{ csrf_field() }}
                    <select name="quantity" class="form-control col-md-2 mr-1">
                        <option selected>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <button type="submit" class="btn btn-primary col-md-6">カートに入れる</button>
                </form>
                @endauth
            </div>
        </div>
    </div>
    <div class="recomend">

        <h2>Recomend Item</h2>
    </div>


    <div class="row justify-content-center recomend">
        @foreach ($recomend_items as $recomend_item)
        <div class="col-md-4 mb-2">
            <div class="card">
                <img src="https://imagebacket.s3-ap-northeast-1.amazonaws.com/{{ $recomend_item->image_path }}" alt="">
                <div class="card-header">
                    <a href="/item/{{ $recomend_item->id }}">{{ $recomend_item->name }}</a>
                </div>
                <div class="card-body">
                    <p>{{ $recomend_item->amount }}円</p>
                </div>
                @auth
                <form action="cartitem" method="post" class="form-inline m-1">
                    {{ csrf_field() }}
                    <select name="quantity" class="form-control col-md-2 mr-1">
                        <option selected>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <button type="submit" class="btn btn-primary col-md-6">カートに入れる</button>
                </form>
                @endauth
            </div>
        </div>
        @endforeach

    </div>
</div>


@endsection