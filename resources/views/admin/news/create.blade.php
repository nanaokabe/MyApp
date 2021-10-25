@extends('layout.admin')
@section('title', 'ニュースの新規投稿')
@section('content')


<form action="{{ action('Admin\MainController@store') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
  <div class="col-md-12">投稿タイトル  </div>
    <textarea name="title" cols="100" rows="1" ></textarea>
  </div>
  
    <div class="col-md-12">投稿内容  </div>
    <textarea name="body" cols="100" rows="20" ></textarea>
    </div>
  
    <div class="col-md-12">
      @csrf
    <input type="file" name="image" accept="image/png, image/jpeg">
    <input type="submit" value="Upload">
    </div>
  
  
</form>