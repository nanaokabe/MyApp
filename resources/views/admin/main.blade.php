@extends('layout.admin')
@section('title', '管理人のトップページ')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <button type="button"><a href="/admin/news/create">ニュースの新規作成</button></a>
    </div>
 
        @foreach ($posts as $news)
          <img width="320" height="180" align="left" src="{{ $news->image_path }}">
            <b><h7>{{ $news->title }}</h7></b><br>
              {{ Str::limit($news->body,500) }}<br>
              {{ $news->created_at }}
              <div class="col-md-1 offset-md-11"> 
                 <a href="{{ action('Admin\MainController@edit', ['id' => $news->id]) }}">編集</a>
                </div>
        @endforeach
                
                
                <div class="col-md-12">
                  <a href="./main">トップページに戻る</a>
                </div>
  </div>
</div>