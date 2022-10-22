@extends('layouts.app')

@section('content')
<h1>作成した案件</h1>
<table>
    @foreach($my_demands as $my_demand)
    <tr>
        <td>{{$my_demand->title}}</td>
        <td><a href="/direct_messages/{{$my_demand->id}}">メッセージ</a></td>
    </tr>
    @endforeach
</table>

<h1>承諾された案件</h1>
<table>
    @foreach($other_demands as $other_demand)
    <tr>
        <td>{{$other_demand->demand->title}}</td>
        <td><a href="/direct_messages/{{$other_demand->demand->id}}">メッセージ</a></td>
    </tr>
    @endforeach
</table>


@endsection