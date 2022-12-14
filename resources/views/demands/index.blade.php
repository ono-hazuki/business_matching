
@extends('layouts.app')
@section('title', '案件一覧')
@section('content')
    @foreach($demands as $demand)
        @continue($demand->status == 2)
        <div class="card text-dark bg-light mb-3 mx-auto" style="width: 95%;">
            <div class="card-header">
                <h2>{{$demand->title}}</h2>
            </div>
            <div class="card-body">
                <button class="btn btn-secondary btn-lg" type="button" data-toggle="collapse" data-target="#collapseExample{{$demand->id}}" aria-expanded="false" aria-controls="collapseExample">
                    内容を見る
                </button>
                <div class="collapse" id="collapseExample{{$demand->id}}">
                    <div class="card card-body">
                        <p class="card-text" style="padding:10px;">{{$demand->description}}</p>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-between mt-5">
                    <div>
                        <p class="lead">値段:{{$demand->price}}円</p>
                        <p class="lead">期限:{{$demand->deadline}}</p>
                    </div>
                    <div>
                        <a class="btn btn-outline-primary mt-5 mr-2 px-5" href="/demands/{{$demand->id}}" role="button">詳細</a>
                    </div>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-end">
                    @foreach($demand->consenters as $consenter)
                        @if($consenter->user_id == $my_user_id)
                            <p class="lead">この案件は立候補済です</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endsection
