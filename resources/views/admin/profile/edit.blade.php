@extends('layouts.admin')
@section('title', 'profileの編集')

@section('content')
<div class="col-md-8 mx-auto">
  <h2>プロフィールの編集</h2>
  <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">
    @if (count($errors) > 0)
    <ul>
      @foreach($errors->all() as $e)
      <li>{{ $e }}</li>
      @endforeach
    </ul>
    @endif
    <div class="form-group row">
      <label class="col-md-2" for="name">氏名</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2" for="gender">性別</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="gender" value="{{ $profile_form->gender }}">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2" for="hobby">趣味</label>
      <div class="col-md-10">
        <input type="text" class="form-control" name="hobby" value="{{ $profile_form->hobby  }}">
      </div>
    </div>

    <div class="form-group row">
      <label class="col-md-2" for="introduction">自己紹介</label>
      <div class="col-md-10">
        <textarea class="form-control" name="introduction" rows="20">{{ $profile_form->introduction }}</textarea>
      </div>
    </div>
    <div class="form-group row">
      <div class="col-md-10">
        <input type="hidden" name="id" value="{{ $profile_form->id }}">
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary" value="更新">
        <a href="{{ route('admin.profile.delete', ['id' => $profile_form->id]) }}" class="btn btn-danger">削除</a>
        <a href="{{ route('admin.profile') }}" class="btn btn-outline-primary">戻る</a>
      </div>
    </div>
  </form>
</div>

<div class="col-md-8 mx-auto">
  <h2>編集履歴</h2>
  <ul class="list-group">
    @if ($profile_form->histories != NULL)
    @foreach ($profile_form->histories as $history)
    <li class="list-group-item">{{ $history->edited_at }}</li>
    @endforeach
    @endif
  </ul>
</div>

@endsection