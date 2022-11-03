
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
                <div style="width: 100%; height: 100px; overflow-y: scroll; border: 1px #C0C0C0 solid; border-radius: 5px; background-color: white;">
                    <p class="card-text" style="padding:10px;">{{$demand->description}}</p>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a class="btn btn-outline-primary mt-3" href="/demands/{{$demand->id}}" role="button">詳細</a>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    @foreach($demand->consenters as $consenter)
                        @if($consenter->user_id == $my_user_id)
                            <p>この案件は立候補済です</p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    @endforeach
@endsection
