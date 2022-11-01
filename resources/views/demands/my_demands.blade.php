@extends('layouts.app')

@section('title', '作成した案件')
@section('content')
<table>
    <tr>
        <th>タイトル</th>
        <th>内容</th>
        <th>確認</th>
        <th>メッセージ</th>
    </tr>
    @foreach($my_demands as $my_demand)
    <tr>
        <td>{{$my_demand->title}}</td>
        <td>{{$my_demand->description}}</td>
        <td><a href="demands/{{$my_demand->id}}">確認</a></td>
        <td><a href="/direct_messages/{{$my_demand->id}}">メッセージ</a></td>
    </tr>
    @endforeach
</table>

@endsection