
@extends('layouts.app')

@section('content')
<table>
    <tr>
        <th>タイトル</th>
        <th>内容</th>
        <th>詳細</th>
    </tr>
    @foreach($demands as $demand)
    <tr>
        <td>{{$demand->title}}</td>
        <td>{{$demand->description}}</td>
        <td><a href=#>詳細</a></td>
    </tr>
    @endforeach
</table>

@endsection
