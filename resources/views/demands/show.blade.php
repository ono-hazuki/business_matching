@extends('layouts.app')

@section('title', '案件詳細')
@section('content')
<div class="card border-light mb-3 m-auto" style="max-width: 60rem;">
    <div class="card-header border">
        <h2 class="text-center mt-3">{{$demand->title}}</h2>
        <p class="text-right mb-1 lead">案件作成者:{{$demand->user->name}}</p>
    </div>
    <div class="card-body border">
        <p class="card-text m-auto"  style="width: 50rem; line-height: 1.5rem;">{{$demand->description}}</p>
        <p class="card-text lead mt-5">値段:{{$demand->price}}円</p>
        <p class="card-text lead">受付終了日:{{$demand->deadline}}</p>
        <p class="card-text lead">募集の有効:
            @if($demand->status == 0)
                無効中
            @elseif($demand->status == 1)
                有効中
            @else
                終了
            @endif
        </p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2 mr-4">
            <a href="/demands/{{$demand->id}}/edit">
                <button class="btn btn-primary px-5">編集</button>
            </a>
        </div>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-2 mr-4">
            <button type="button" class="btn btn-primary px-5" data-toggle="modal" data-target="#exampleModal">
                削除
            </button>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">警告</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>本当に削除しますか？</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                            <form action="/demands/{{$demand->id}}" method="post">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-primary px-5">削除</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 


<div class="d-flex justify-content-between mt-3">
    <table class="table table-hover table-bordered ml-5 mb-auto" style="width: 30rem;">
        <thead>
            <tr>
                <th scope="col">未確認の立候補者</th>
                <th scope="col">承認状態</th>
                <th scope="col">承認状態を変える</th>
            </tr>
        </thead>
        <tbody>
            @foreach($consenters as $consenter)
                @if($consenter->status == 0)
                    <tr>
                        <td class="text-center">{{$consenter->user->name}}</td>
                        <td class="text-center">
                            @if($consenter->status == 0)
                                未確認
                            @elseif($consenter->status == 1)
                                承認中
                            @else
                                却下
                            @endif
                        </td>
                        <td class="d-flex justify-content-between px-3">
                            <form action="/consenters/{{$demand->id}}/{{$consenter->id}}/update" method="post">
                                @csrf
                                <button class="btn btn-primary px-3" type="submit" name="status" value=1>承認する</button>
                            </form>
                            <form action="/consenters/{{$demand->id}}/{{$consenter->id}}/update" method="post">
                                @csrf
                                <button class="btn btn-primary px-3" type="submit" name="status" value=2>却下する</button>
                            </form>
                        </td>
                    </tr>
                @endif
            @endforeach
      </tbody>
    </table>
    
    <div class="mr-3">
        <table class="table table-hover table-bordered mr-4" style="width: 30rem;">
            <thead>
                <tr>
                    <th scope="col">承認した立候補者</th>
                    <th scope="col">承認状態</th>
                    <th scope="col">承認状態を変える</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consenters as $consenter)
                    @if($consenter->status == 1)
                        <tr>
                            <td class="text-center">{{$consenter->user->name}}</td>
                            <td class="text-center">
                                @if($consenter->status == 0)
                                    未確認
                                @elseif($consenter->status == 1)
                                    承認中
                                @else
                                    却下
                                @endif
                            </td>
                            <td class="d-flex justify-content-center px-3">
                                <form action="/consenters/{{$demand->id}}/{{$consenter->id}}/update" method="post">
                                    @csrf
                                    <button class="btn btn-primary px-3" type="submit" name="status" value=2>却下する</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        
        <table class="table table-hover table-bordered mr-4" style="width: 30rem;">
            <thead>
                <tr>
                    <th scope="col">却下した立候補者</th>
                    <th scope="col">承認状態</th>
                    <th scope="col">承認状態を変える</th>
                </tr>
            </thead>
            <tbody>
                @foreach($consenters as $consenter)
                    @if($consenter->status > 1)
                        <tr>
                            <td class="text-center">{{$consenter->user->name}}</td>
                            <td class="text-center">
                                @if($consenter->status == 0)
                                    未確認
                                @elseif($consenter->status == 1)
                                    承認中
                                @else
                                    却下
                                @endif
                            </td>
                            <td class="d-flex justify-content-center px-3">
                                <form action="/consenters/{{$demand->id}}/{{$consenter->id}}/update" method="post">
                                    @csrf
                                    <button class="btn btn-primary px-3" type="submit" name="status" value=1>承認する</button>
                                </form>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection