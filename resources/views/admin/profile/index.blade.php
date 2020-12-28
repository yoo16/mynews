@extends('layouts.admin')
@section('title', '登録済みのプロフィール一覧')

@section('content')
<div class="container">
  <div class="row">
    <h2>プロフィール一覧</h2>
  </div>
  <form action="{{ action('Admin\ProfileController@index') }}" method="get">
    <div class="row">
      <div class="col-md-4">
        <a href="{{ action('Admin\ProfileController@add') }}" role="button" class="btn btn-primary">新規作成</a>
      </div>
      <div class="col-md-8">
        <div class="form-group row">
          <label class="col-md-2">氏名</label>
          <div class="col-md-8">
            <input type="text" class="form-control" name="cond_name" value="{{ $cond_name }}">
          </div>
          <div class="col-md-2">
            {{ csrf_field() }}
            <input type="submit" class="btn btn-primary" value="検索">
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
<div class="row">
  <div class="list-news col-md-12 mx-auto">
    <div class="row">
      <table class="table">
        <thead>
          <tr>
            <th width="10%"></th>
            <th>氏名</th>
            <th>性別</th>
          </tr>
        </thead>
        <tbody>
          @foreach($posts as $profile)
          <tr>
            <td>
              <a href="{{ route('admin.profile.edit', ['id' => $profile->id]) }}"
                class="btn btn-sm btn-outline-primary">編集</a>
            </td>
            <td>{{ \Str::limit($profile->name, 100) }}</td>
            <td>{{ \Str::limit($profile->gender, 250) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection