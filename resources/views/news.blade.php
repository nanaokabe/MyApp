@extends('layout.admin')
@section('title', 'ニュース一覧')
@section('content')

<div class="container">
  <div class="row">
      @foreach ($posts as $news)
      <div class="col-md-12">
        <img width="320" height="180" align="left" src="{{ $news->image_path }}">
        <b><h4><font face='HiraMinProN-W6'>{{ $news->title }}</font></h4></b>
          {{ Str::limit($news->body,500) }}<br>
          {{ $news->created_at }}<br>
      </div>
      @endforeach
  </div>
</div>
        