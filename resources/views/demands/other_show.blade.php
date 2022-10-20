@extends('layouts.app')

@section('content')

<table>
    <tr>
        <td>案件作成者</td>
        <td>{{$demand->user->name}}</td>
    </tr>
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
        <td>
            @if($registered)
            この案件は立候補済みです
            @elseif($demand->status == 0)
            この案件は現在立候補できません
            @elseif($demand->status == 1)
            <form action="/consenters/{{$demand->id}}" method="post">
                @csrf
                <button type="submit">立候補する</button>
            </form>
            @elseif($demand->status == 2)
            この案件は終了しました
            @else
            この案件は有効でないため立候補できません
            @endif
        </td>
        <td></td>
    </tr>
    <tr>
        <td>
            @if($registered)
            <form action="/consenters/{{$demand->id}}/{{$consenter->id}}" method="post">
                @csrf
                <button type="submit">案件を辞退する</button>
            </form>
            @endif
        </td>
        <td></td>
    </tr>
</table>

@endsection