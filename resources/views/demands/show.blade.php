
@extends('layouts.app')

@section('content')

<table>
    <tr>
        <td>タイトル</td>
        <td>{{$demand->title}}</td>
    </tr>
    <tr>
        <td>内容</td>
        <td>{{$demand->description}}</td>
    </tr>
    <tr>
        <td>値段</td>
        <td>{{$demand->price}}</td>
    </tr>
    <tr>
        <td>受付終了日</td>
        <td>{{$demand->deadline}}</td>
    </tr>
    <tr>
        <td>募集の有効</td>
        <td>
            @if($demand->status == 0)
            無効中
            @elseif($demand->status == 1)
            有効中
            @else
            終了
            @endif
        </td>
    </tr>
    <tr>
        <td><a href="/demands/{{$demand->id}}/edit">
            <button>編集</button>
        </a></td>
        <td></td>
    </tr>
    <tr>
        <td>
            <form action="/demands/{{$demand->id}}" method="post">
                @csrf
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit">削除</button>
            </form>
        </td>
        <td></td>
    </tr>
    <tr>
        <td><a href="/consenters/{{$demand->id}}">この案件に立候補した人を確認する</a></td>
        <td></td>
    </tr>
</table>

@endsection