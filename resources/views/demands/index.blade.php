
@extends('layouts.app')

@section('content')
<h1>案件一覧</h1>
<table>
    <tr>
        <th>タイトル</th>
        <th>内容</th>
        <th>詳細</th>
    </tr>
    @foreach($demands as $demand)
        @continue($demand->status == 2)
    <tr>
        <td>{{$demand->title}}</td>
        <td>{{$demand->description}}</td>
        <td><a href="/demands/{{$demand->id}}">詳細</a></td>
    </tr>
    @endforeach
</table>

@endsection
