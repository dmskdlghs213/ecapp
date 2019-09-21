@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    お届け先情報入力
                </div>
                <div class="card-body">
                    <form action="/buy" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="name">氏名</label>
                                @if(Request::has('confirm'))
                                <p class="form-control-static">{{ old('name') }}</p>
                                @else
                                <input type="text" id="name" class="form-control" name="name" value="{{ old('name') }}">
                                @endif
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-2">
                                <label for="postalcode">郵便番号</label>
                                @if(Request::has('confirm'))
                                <p class="form-control-static">{{ old('postalcode') }}</p>
                                <input type="hidden" id="postalcode" name="postalcode" value="{{ old('postalcode') }}">
                                @else
                                <input type="text" id="postalcode" name="postalcode" class="form-control" value="{{ old('postalcode') }}">
                                @endif
                            </div>

                            <div class="form-group col-md-4">
                                <label for="region">都道府県</label>
                                @if(Request::has('confirm'))
                                <p class="form-control-static">{{ old('region') }}</p>
                                <input id="region" type="hidden" name="region" value="{{ old('region') }}">
                                @else
                                <select id="region" class="form-control" name="region">
                                    @foreach(Config::get('region') as $value)
                                    <option @if(old('region')==$value) selected @endif>{{ $value }}</option>
                                    @endforeach
                                </select>
                                @endif
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="form-group col-md-6">
                                <label for="addressline">住所</label>
                                @if(Request::has('confirm'))
                                <p class="form-control-static">{{ old('addressline') }}</p>
                                <input id="addressline" type="hidden" name="addressline" value="{{ old('addressline') }}">
                                @else
                                <input id="addressline" type="text" class="form-control" name="addressline" value="{{ old('addressline') }}">
                                @endif
                            </div>
                        </div>

                        <div class="form-row mb-1">
                            <div class="form-group col-md-6">
                                <label for="phonenumber">電話番号</label>
                                @if(Request::has('confirm'))
                                <p class="form-control-static">{{ old('phonenumber')}}</p>
                                <input id="phonenumber" type="hidden" name="phonenumber" value="{{ old('phonenumber') }}">
                                @else
                                <input id="phonenumber" type="text" class="form-control" name="phonenumber" value="{{ old('phonenumber') }}">
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card">
                                @foreach($cartitems as $cartitem)
                                <div class="card-header">
                                    <input type="hidden" name="cart_item_id[]" value="{{ $cartitem->item_id }}">
                                    <a> {{ $cartitem->name }}</a>
                                </div>
                                <div class="card-body">
                                    <div>
                                        {{ $cartitem->amount }}円
                                    </div>
                                    <div>
                                        <input type="hidden"name="quantity[]"value="{{ $cartitem->quantity }}">
                                        {{ $cartitem->quantity }}個
                                    </div>
                                </div>

                                @endforeach
                            </div>
                            <div class="card-footer">
                                <p>合計金額</p>
                                <input type="hidden"name="order_id[]"value="{{ $cartitem->id }}">
                                {{ $subtotal }} 円
                            </div>
                        </div>
                        <div class="row justify-content-center" style="margin-top:20px;">
                            <div class="form-row">
                                <div class="col-md-8">
                                    @if(Request::has('confirm'))
                                    <form class="cartitem" method="post" label="order">
                                        <a href="/item/{{ $cartitem->id }}"></a>
                                        <button type="submit" class="btn btn-primary" name="post">注文を確定する</button>
                                    </form>
                                    <button type="submit" class="btn btn-default" name="back">修正する</button>
                                    @else
                                    <button type="submit" class="btn btn-primary" name="confirm">入力内容を確認する</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection