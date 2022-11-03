
@extends('layouts.app')

@section('title', '案件を編集する')
@section('content')
<div class="card-body m-4 text-" style="width: 35rem;">
    <form  action="/demands/{{$demand->id}}" method="post">
        @csrf
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group mb-4">
            <label class="lead">タイトル</label>
            <input type="text" name="title" class="form-control" value="{{$demand->title}}" required>
        </div>
        <div class="form-group mb-4">
            <label class="lead">内容</label>
            <textarea name="description" class="form-control" required style="height: 15rem;">{{$demand->description}}</textarea>
        </div>
        <div class="form-group mb-4">
            <label class="lead">値段</label>
            <input type="number" name="price" class="form-control" value="{{$demand->price}}" required>
        </div>
        <div class="form-group mb-4">
            <label class="lead">受付終了日</label>
            <input type="date" name="deadline" class="form-control" value="{{$demand->deadline}}" required>
        </div>
        <div class="form-group mb-4">
            @if($demand->status == 0)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value=0 checked>
                    <label class="form-check-label lead" for="gridRadios2">
                        無効
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value=1>
                    <label class="form-check-label lead" for="gridRadios2">
                        有効
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value=2>
                    <label class="form-check-label lead" for="gridRadios2">
                        終了
                    </label>
                </div>
            @elseif($demand->status == 1)
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
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value=2>
                    <label class="form-check-label lead" for="gridRadios2">
                        終了
                    </label>
                </div>
            @elseif($demand->status == 2)
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value=0>
                    <label class="form-check-label lead" for="gridRadios2">
                        無効
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value=1>
                    <label class="form-check-label lead" for="gridRadios2">
                        有効
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value=2 checked>
                    <label class="form-check-label lead" for="gridRadios2">
                        終了
                    </label>
                </div>
            @else
             <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value=0  checked>
                    <label class="form-check-label lead" for="gridRadios2">
                        無効
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value=1>
                    <label class="form-check-label lead" for="gridRadios2">
                        有効
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="status" value=2>
                    <label class="form-check-label lead" for="gridRadios2">
                        終了
                    </label>
                </div>
            @endif
        </div>
        <div class="text-right">
           <button type="submit" class="btn btn-primary btn-lg px-4">登録</button>
        </div>
    </form>
</div>
@endsection