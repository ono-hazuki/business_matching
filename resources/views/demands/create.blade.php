@extends('layouts.app')

@section('title', '案件作成')
@section('content')
<div class="card-body m-4 text-" style="width: 35rem;">
    <form  action="/demands" method="post">
        @csrf
        <div class="form-group mb-4">
            <label class="lead">タイトル</label>
            <input type="text" name="title" class="form-control"  placeholder="案件タイトルを入力" required>
        </div>
        <div class="form-group mb-4">
            <label class="lead">内容</label>
            <textarea name="description" class="form-control" placeholder="案件内容を入力" required style="height: 15rem;"></textarea>
        </div>
        <div class="form-group mb-4">
            <label class="lead">値段</label>
            <input type="number" name="price" class="form-control"  placeholder="値段を入力" min="0" required>
        </div>
        <div class="form-group mb-4">
            <label class="lead">受付終了日</label>
            <input type="date" name="deadline" class="form-control"  placeholder="受付終了日を入力" required>
        </div>
        <div class="form-group mb-4">
            <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value=0>
                <label class="form-check-label lead" for="gridRadios2">
                    無効
                </label>
            </div>
                <div class="form-check">
                <input class="form-check-input" type="radio" name="status" value=1 checked>
                <label class="form-check-label lead" for="gridRadios2">
                    有効
                </label>
            </div>
        </div>
        <div class="text-right">
           <button type="submit" class="btn btn-primary btn-lg px-4">登録</button>
        </div>
    </form>
</div>
@endsection