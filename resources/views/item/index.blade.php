@extends('layouts.app')

@section('content')
@if(Session::has('flash_message'))
<div class="alert alert-success">
    {{ session('flash_message') }}
</div>
@endif

<style>



</style>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" style="margin:30px 0px 30px 0px;">
            <div class="card" style="height:300px;background-image:url('/img/omlet.jpg');background-repeat: no-repeat;background-size:contain;">
                <h2 style="text-align:center;">洋食専門店</h2>
            </div>

        </div>

    </div>
    <div class="row justify-content-left">
        @foreach ($items as $item)
        <div class="col-md-4 mb-2">
            <div class="card">
                <div class="card-header">
                    <a href="/item/{{ $item->id }}">{{ $item->name }}</a>

                </div>
                <div class="card-body">

                    {{ $item->amount }}
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
    <div class="row justify-content-center">
        {{ $items->appends(['keyword' => Request::get('keyword')])->links() }}
    </div>
</div>
@endsection