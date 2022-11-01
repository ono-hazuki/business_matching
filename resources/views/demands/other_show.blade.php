@extends('layouts.app')

@section('title', '案件詳細')
@section('content')
<div class="card border-light mb-3 m-auto" style="max-width: 60rem;">
    <div class="card-header">
        <h2 class="text-center mt-3">{{$demand->title}}</h2>
        <p class="text-right mb-1 lead">案件作成者:{{$demand->user->name}}</p>
    </div>
    <div class="card-body">
        <p class="card-text m-auto"  style="width: 50rem; line-height: 1.5rem;">{{$demand->description}}</p>
        <p class="card-text lead mt-5">値段:{{$demand->price}}円</p>
        <p class="card-text lead">受付終了日:{{$demand->deadline}}</p>
        <p class="card-text lead">募集の有効:
            @if($demand->status == 0)
                無効中
            @elseif($demand->status == 1)
                有効中
            @else
                終了
            @endif
        </p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <p class="card-text">
                @if($registered)
                    この案件は立候補済みです
                @elseif($demand->status == 0)
                    この案件は現在立候補できません
                @elseif($demand->status == 1)
                    <form action="/consenters/{{$demand->id}}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">立候補する</button>
                    </form>
                @elseif($demand->status == 2)
                    この案件は終了しました
                @else
                    この案件は有効でないため立候補できません
                @endif
            </p>
            </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            @if($registered)
                <form action="/consenters/{{$demand->id}}/{{$consenter->id}}/destroy" method="post">
                    @csrf
                    <button type="submit" class="btn btn-primary">案件を辞退する</button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection