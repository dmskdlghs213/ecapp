@extends('layouts.app')

@section('content')


<link rel="stylesheet" href="/css/buyindex.css">

<div class="container">
    <div class="modal fade" id="Modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                </div>
                <div class="modal-body">
                    <img src="https://imagebacket.s3-ap-northeast-1.amazonaws.com/ec_image/fullsizeoutput_1a4.jpeg" alt="">
                    <div class="text">
                        <h2>お断り</h2>
                        <p>これは練習で作ったECサイトなので、決済機能は付いておりません。<br>
                            住所などの記入欄はございますが適当に記入していただいて構いません。</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row justify-content-center top">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    お届け先情報入力
                </div>
                <div class="card-body">
                    <form action="/buy" method="post">
                        @csrf
                        

                        <div class="row justify-content-center">
                            <div class="form-group col-md-6 mb-3">
                                <label for="postalcode">郵便番号</label>

                                @if(Request::has('confirm'))
                                <p class="form-control-static">{{ old('postalcode') }}</p>
                                <input type="hidden" id="postalcode" name="postalcode" value="{{ old('postalcode') }}">
                                @else
                                <input type="text" id="postalcode" name="postalcode" class="form-control　@error('postalcode') is-invalid @enderror" value="{{ old('postalcode') }}" 　required autocomplete="current-postalcode">
                                @endif
                                @error('postalcode')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row justify-content-center">
                            <div class="form-group col-md-6 mb-3">
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

                        <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                                <label for="addressline">住所</label>
                                @if(Request::has('confirm'))
                                <p class="form-control-static">{{ old('addressline') }}</p>
                                <input id="addressline" type="hidden" name="addressline" value="{{ old('addressline') }}">
                                @else
                                <input id="addressline" type="text" class="form-control @error('addressline') is-invalid @enderror" name="addressline" value="{{ old('addressline')}}" required autocomplete="current-addresline">
                                @endif
                                @error('addressline')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="form-group col-md-6">
                                <label for="phonenumber">電話番号</label>
                                @if(Request::has('confirm'))
                                <p class="form-control-static">{{ old('phonenumber')}}</p>
                                <input id="phonenumber" type="hidden" name="phonenumber" value="{{ old('phonenumber') }}">
                                @else
                                <input id="phonenumber" type="text" class="form-control @error('phonenumber') is-invalid @enderror" name="phonenumber" value="{{ old('phonenumber') }}">
                                @endif
                                @error('phonenumber')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row justify-content-center">
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
                                            <input type="hidden" name="quantity[]" value="{{ $cartitem->quantity }}">
                                            {{ $cartitem->quantity }}個
                                        </div>
                                    </div>

                                    @endforeach
                                </div>
                                <div class="card-footer">
                                    <p>合計金額</p>
                                    <input type="hidden" name="order_id[]" value="{{ $cartitem->id }}">
                                    {{ $subtotal }} 円
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center submit">
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


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script>
    $(function() {
        $(document).ready(function() {
            $('#Modal').modal('toggle');
        })

      
        function modal_close() {
            var modal = document.getElementById('#Modal');
            modal.style.display = 'none';
            bg.style.display = 'none';
        }

        if (sessionStorage.getItem('acs') === null) {
            // 1回目の場合はWebStorageを設定
            sessionStorage.setItem('acs', 'on');
        } else {
            // 2回目以降の場合はモーダルを削除
            modal_close();
        }

    });
</script>




@endsection