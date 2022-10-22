@extends('layouts.app')

@section('content')

<table>
    @foreach($consenters as $consenter)
        
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
        @endforeach
</table>

@endsection