@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
<div class="alert alert-success">
    {{ session('flash_message') }}
</div>
@endif

<head>

    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <link rel="stylesheet" href="/css/index.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
</head>



<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12" style="margin:30px 0px 30px 0px;">
            <div class="card">
                <div class="message">
                    <h2>オムライス販売店　OmeC</h2>
                    <h4>〜ご家庭でお店みたいなオムライスを〜</h4>
                </div>
                <div class="image">
                    <img class="main_image tra1" src="https://imagebacket.s3-ap-northeast-1.amazonaws.com/ec_image/640_christian-koch-mQ4Ty8VmnPk-unsplash+.jpg" alt="">
                    <img class="main_image tra2" src="https://imagebacket.s3-ap-northeast-1.amazonaws.com/ec_image/640_drew-coffman-jUOaONoXJQk-unsplash+(1).jpg" alt="">
                    <img class="main_image tra3" src="https://imagebacket.s3-ap-northeast-1.amazonaws.com/ec_image/640_toa-heftiba-jPaguWdUuUY-unsplash.jpg" alt="">
                </div>
            </div>
        </div>

    </div>
    <div class="row justify-content-center drop">

        <ul class="col-md-6" id="dropmenu">
            <li><a href="#">Category</a>
                <ul>
                    <li>
                        <form method="GET" name="form_cheese" action="/">
                            <input type="hidden" name="cheese" value="">
                            <a href="javascript:form_cheese.submit()">Cheese style</a>
                        </form>
                    </li>
                    <li>
                        <form method="GET" name="form_demiglace" action="/">
                            <input type="hidden" name="demiglace" value="">
                            <a href="javascript:form_demiglace.submit()">Demiglace style</a>
                        </form>
                    </li>
                    <li>
                        <form method="GET" name="form_cream" action="/">
                            <input type="hidden" name="cream" value="">
                            <a href="javascript:form_cream.submit()">Cream style</a>
                        </form>
                    </li>
                    <li>
                        <form method="GET" name="form_japan" action="/">
                            <input type="hidden" name="japan" value="">
                            <a href="javascript:form_japan.submit()">Japanese style</a>
                        </form>
                    </li>

                </ul>
            </li>
            <li><a href="/">All</a>
            </li>
        </ul>


        <form class="col-md-3 col-sm-5" method="GET" action="/">
            <div class="input-group">
                <input type="text" class="form-control" name="keyword" placeholder="キーワードを入力">
                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
        </form>
    </div>

    <div class="row justify-content-center main">

        @foreach ($items as $item)
        <div class="col-md-4 mb-2">
            <div class="card">
                <img href="/item/{{ $item->id }}" src="https://imagebacket.s3-ap-northeast-1.amazonaws.com/{{ $item->image_path }}" alt="">
                <div class="card-header">
                    <a href="/item/{{ $item->id }}">{{ $item->name }}</a>
                </div>
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
        @endforeach
    </div>
    <div class="row justify-content-center page">
        {{ $items->appends(['keyword' => Request::get('keyword')])->links() }}
    </div>
</div>
<div class="copy-right">
    <p>&copy 2019, masatoinoue</p>
</div>



@endsection