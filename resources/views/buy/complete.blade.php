@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="margin-bottom:10px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    購入完了しました！
                </div>
            </div>
            <div class="card-footer">
                <form action="/">
                    <button type="submit" class="btn btn-primary" name="post">トップへ戻る</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection