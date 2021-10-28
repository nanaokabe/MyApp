@extends('layout.admin')
@section('title', '検索結果')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <h1>検索結果</h1>
    </div>
      
   @if($cordinates->count())
    <div class="col-md-3 offset-md-1">
          @foreach ($cordinates as $corde)
          <a href="{{ url('/corde/' . $corde->id) }}">
           <img name="image" width="300" height="350" src="{{ secure_asset( $corde->image_path) }}">
          </a>
          @endforeach
    </div>
       
      @else
      <p>見つかりませんでした。</p>
      @endif
      
  </div>
</div>