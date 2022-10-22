@extends('layouts.app')

@section('content')

<table>
    @foreach($direct_messages as $direct_message)
        @if($direct_message->user_id == $my_user_id)
        <tr>
            <td>{{$direct_message->user->name}}</td>
            <td>{{$direct_message->text}}</td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <form action="/direct_messages/{{$demand->id}}/{{$direct_message->id}}/destroy" method="post">
                @csrf
                <button type="submit">削除</button>
            </form>
            </td>
            <td></td>
            <td></td>
        </tr>
        @else
        <tr>
            <td></td>
            <td></td>
            <td>{{$direct_message->text}}</td>
            <td>{{$direct_message->user->name}}</td>
        </tr>
        @endif
    @endforeach
</table>



<form action="/direct_messages/{{$demand->id}}" method="post">
  @csrf
  <table>
      <tr>
          <td><label>メッセージを送る</label></td>
          <td><textarea name="text"></textarea></td>
      </tr>
      <tr>
          <td><input type="submit"></td>
          <td></td>
      </tr>
  </table>
</form>

@endsection