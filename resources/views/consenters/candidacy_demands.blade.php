@extends('layouts.app')

@section('title', '立候補した案件')
@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">タイトル</th>
            <th scope="col">判定</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($consenters as $consenter)
            <tr>
                <th scope="row"></th>
                <td>{{$consenter->demand->title??'案件消去済'}}</td>
                <td>
                    @if($consenter->status == 1)
                        承認中
                    @elseif($consenter->status == 2)
                        却下
                    @else
                        未確認
                    @endif
                </td>
                <td><a href="/demands/{{$consenter->demand_id}}">詳細</a></td>
                <td>
                    @if($consenter->status == 1)
                        <a href="/direct_messages/{{$consenter->demand->id??'案件消去済'}}">メッセージ</a>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>


@endsection