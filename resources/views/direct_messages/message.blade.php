@extends('layouts.app')

@section('title', 'メッセージ')
@section('content')
<div class="d-flex flex-column" style="margin-bottom:17rem;">
    <h2 class="ml-1">メッセージ一覧</h2>
    @foreach($direct_messages as $direct_message)
        @if($direct_message->user_id == $my_user_id)
            <div class="d-flex">
                <p class="h-50 my-auto mx-2">{{$direct_message->user->name}}</p>
                <div class="card w-75 mr-auto my-3">
                    <div class="card-body">
                        <p>{{$direct_message->text}}</p>
                        <form class="text-right" action="/direct_messages/{{$demand->id}}/{{$direct_message->id}}/destroy" method="post">
                            @csrf
                            <button type="submit" class="btn btn-dark">削除</button>
                        </form>
                    </div>
                </div>
            </div>
        @else
            <div class="d-flex">
                <div class="card w-75 ml-auto my-3">
                    <div class="card-body">
                        {{$direct_message->text}}
                    </div>
                </div>
                <p class="h-50 my-auto mx-2">{{$direct_message->user->name}}</p>
            </div>
        @endif
    @endforeach
</div>
<div class="fixed-bottom bg-white">
        @if(session('message'))
            <div class="alert alert-dark alert-dismissible fade show my-0" role="alert">
                <span>{{ session('message') }}</span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
    <hr class="mt-0">
    <div class="w-75 mx-auto">
        <h2 class="ml-1">メッセージ入力</h2>

        <form action="/direct_messages/{{$demand->id}}" method="post">
            @csrf
            <div class="form-group d-flex flex-column">
            <textarea name="text" class="form-control" placeholder="メッセージを入力してください"></textarea>
            <input class="btn btn-primary my-1 ml-auto mr-1 px-3 " type="submit">
            </div>
        </form>
    </div>
</div>
<script>
    //let scroll = document.getElementById('app');
    //document.getElementById('app').scrollIntoView(false);
    window.scroll(0, document.getElementById("contentBody").scrollHeight);
</script>


@endsection