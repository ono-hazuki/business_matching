@extends('layouts.app')

@section('content')



<table>
    <tr>
        <th>タイトル</th>
        <th>詳細</th>
        <th>判定</th>
    </tr>
    @foreach($consenters as $consenter)
    <tr>
        <td>{{$consenter->demand->title}}</td>
        <td><a href="/demands/{{$consenter->demand_id}}">詳細</a></td>
        <td>
            @if($consenter->status == 1)
            承認中
            @elseif($consenter->status == 2)
            却下
            @else
            未確認
            @endif
        </td>
        <td>
            @if($consenter->status == 1)
            <a href="/direct_messages/{{$consenter->demand->id}}">メッセージ</a>
            @endif
        </td>
    </tr>
    @endforeach
</table>



@endsection