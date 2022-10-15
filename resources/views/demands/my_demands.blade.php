@extends('layouts.app')

@section('content')

<h1>作成した案件</h1>

<table>
    <tr>
        <th>タイトル</th>
        <th>内容</th>
        <th>確認</th>
    </tr>
    @foreach($my_demands as $my_demand)
    <tr>
        <td>{{$my_demand->title}}</td>
        <td>{{$my_demand->description}}</td>
        <td><a href="demands/{{$my_demand->id}}">確認</a></td>
    </tr>
    @endforeach
</table>

@endsection