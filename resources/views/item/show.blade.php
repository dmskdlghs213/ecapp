@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
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
    </div>
</div>
@endsection