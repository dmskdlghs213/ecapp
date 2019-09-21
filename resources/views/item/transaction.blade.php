@extends('layouts.app')

@section('content')

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        購入履歴一覧
                    </div>
                    <div class="col-md-10">
                        <div class="card-body">
                            @foreach($items as $item)
                            <div>
                                <li>商品名：{{ $item->name }}</li>
                                <a>購入金額：{{ $item->amount }}</a>
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


</body>
@endsection