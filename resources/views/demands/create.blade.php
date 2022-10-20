@extends('layouts.app')

@section('content')
<h1>案件を作成する</h1>

<form action="/demands" method="post">
  @csrf
  <table>
      <tr>
          <td><label>タイトル</label></td>
          <td><input type="text" name="title"></td>
      </tr>
      <tr>
          <td><label>内容</label></td>
          <td><textarea name="description"></textarea></td>
      </tr>
      <tr>
          <td><label>値段</label></td>
          <td><input type="number" name="price">円</td>
      </tr>
      <tr>
          <td><label>受付終了日</label></td>
          <td><input type="date" name="deadline"></td>
      </tr>
      <tr>
          <td><label>募集の有効</label></td>
          <td>
            <label>無効</label><input type="radio" name="status" value=0>
            <label>有効</label><input type="radio" name="status" value=1>
          </td>
      </tr>
      <tr>
          <td><input type="submit"></td>
          <td></td>
      </tr>
  </table>
</form>

@endsection