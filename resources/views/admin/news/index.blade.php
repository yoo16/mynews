@extends('layouts.admin')
@section('title', '登録済みニュースの一覧')

@section('content')
<div class="row">
  <h2>ニュース一覧</h2>
</div>

<div class="row">
  <div class="col-md-4">
    <a href="{{ action('Admin\NewsController@add') }}" role="button" class="btn btn-primary">新規作成</a>
  </div>
  <div class="col-md-8">
    <form action="{{ action('Admin\NewsController@index') }}" method="get">
      <div class="form-group row">
        <label class="col-md-2">タイトル</label>
        <div class="col-md-8">
          <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
        </div>
        <div class="col-md-2">
          {{ csrf_field() }}
          <input type="submit" class="btn btn-primary" value="検索">
        </div>
      </div>
    </form>
  </div>
</div>

<div class="row">
  <div class="mx-auto">
    @if (count($posts) > 0)
    <table class="table">
      <thead>
        <tr>
          <th width="5%"></th>
          <th width="20%">タイトル</th>
          <th width="50%">本文</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $news)
        <tr>
          <td>
            <div>
              <a href="{{ action('Admin\NewsController@edit', ['id' => $news->id]) }}"
                class="btn btn-sm btn-outline-primary">編集</a>
            </div>
          </td>
          <td>{{ \Str::limit($news->title, 100) }}</td>
          <td>{{ \Str::limit($news->body, 250) }}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
  </div>
</div>
@endsection