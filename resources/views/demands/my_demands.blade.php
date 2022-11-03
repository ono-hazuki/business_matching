@extends('layouts.app')

@section('title', '作成した案件')
@section('content')
<table class="table table-hover mx-auto">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">タイトル</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($my_demands as $my_demand)
            <tr>
                <th scope="row"></th>
                <td>{{$my_demand->title}}</td>
                <td><a href="demands/{{$my_demand->id}}">詳細</a></td>
                <td><a href="/direct_messages/{{$my_demand->id}}">メッセージ</a></td>
            </tr>
        @endforeach
    </tbody>
    </table>
@endsection