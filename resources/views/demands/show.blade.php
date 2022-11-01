@extends('layouts.app')

@section('title', '案件詳細')
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
</table>

<h2>この案件の立候補者</h2>
<h3>承諾した立候補者</h3>
<table>
    @foreach($consenters as $consenter)
        @if($consenter->status == 1)
            <tr>
                <td>{{$consenter->user->name}}</td>
                <td>
                    @if($consenter->status == 0)
                        未確認
                    @elseif($consenter->status == 1)
                        承認中
                    @else
                        却下
                    @endif
                </td>
                <td>
                    <form action="/consenters/{{$demand->id}}/{{$consenter->id}}/update" method="post">
                        @csrf
                        <button type="submit" name="status" value=1>承認する</button>
                    </form>
                </td>
                <td>
                    <form action="/consenters/{{$demand->id}}/{{$consenter->id}}/update" method="post">
                        @csrf
                        <button type="submit" name="status" value=2>却下する</button>
                    </form>
                </td>
            </tr>
        @endif
    @endforeach
</table>
<h3>未確認の立候補者</h3>
<table>
    @foreach($consenters as $consenter)
        @if($consenter->status == 0)
            <tr>
                <td>{{$consenter->user->name}}</td>
                <td>
                    @if($consenter->status == 0)
                        未確認
                    @elseif($consenter->status == 1)
                        承認中
                    @else
                        却下
                    @endif
                </td>
                <td>
                    <form action="/consenters/{{$demand->id}}/{{$consenter->id}}/update" method="post">
                        @csrf
                        <button type="submit" name="status" value=1>承認する</button>
                    </form>
                </td>
                <td>
                    <form action="/consenters/{{$demand->id}}/{{$consenter->id}}/update" method="post">
                        @csrf
                        <button type="submit" name="status" value=2>却下する</button>
                    </form>
                </td>
            </tr>
        @endif
    @endforeach
</table>
<h3>却下したの立候補者</h3>
<table>
    @foreach($consenters as $consenter)
        @if($consenter->status > 1)
            <tr>
                <td>{{$consenter->user->name}}</td>
                <td>
                    @if($consenter->status == 0)
                        未確認
                    @elseif($consenter->status == 1)
                        承認中
                    @else
                        却下
                    @endif
                </td>
                <td>
                    <form action="/consenters/{{$demand->id}}/{{$consenter->id}}/update" method="post">
                        @csrf
                        <button type="submit" name="status" value=1>承認する</button>
                    </form>
                </td>
                <td>
                    <form action="/consenters/{{$demand->id}}/{{$consenter->id}}/update" method="post">
                        @csrf
                        <button type="submit" name="status" value=2>却下する</button>
                    </form>
                </td>
            </tr>
        @endif
    @endforeach
</table>

@endsection