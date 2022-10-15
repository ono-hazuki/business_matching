
@extends('layouts.app')

@section('content')
<h1>依頼を編集する</h1>

<form action="/demands/{{$demand->id}}" method="post">
  @csrf
  <input type="hidden" name="_method" value="PUT">
  <table>
      <tr>
          <td><label>タイトル</label></td>
          <td><input type="text" name="title" value="{{$demand->title}}"></td>
      </tr>
      <tr>
          <td><label>内容</label></td>
          <td><textarea name="description">{{$demand->description}}</textarea></td>
      </tr>
      <tr>
          <td><label>値段</label></td>
          <td><input type="number" name="price" value="{{$demand->price}}">円</td>
      </tr>
      <tr>
          <td><label>受付終了日</label></td>
          <td><input type="date" name="deadline" value="{{$demand->deadline}}"></td>
      </tr>
      <tr>
        　<td><label>募集の有効</label></td>
          <td>
            @if($demand->status == 0)
            <label>無効</label><input type="radio" name="status" value=0 checked>
            <label>有効</label><input type="radio" name="status" value=1>
            @elseif($demand->status == 1)
            <label>無効</label><input type="radio" name="status" value=0>
            <label>有効</label><input type="radio" name="status" value=1 checked>
            @else
            <label>無効</label><input type="radio" name="status" value=0>
            <label>有効</label><input type="radio" name="status" value=1>
            @endif
          </td>
      </tr>
      <tr>
          <td><input type="submit"></td>
          <td></td>
      </tr>
  </table>
</form>

@endsection