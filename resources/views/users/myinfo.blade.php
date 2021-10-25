@extends('layout.admin')

@section('title', 'マイページ')

@section('content')

<div class="container">
  <div class="row">
    
    <div class="col-md-12">
      <div class="nickname">
      {{ $auths->nickname??"ナナシ"}}さんのマイページ
      </div>
    </div>
          
        <div class="col-md-1 offset-md-4">
          @if(isset($auths->image_path))
          <img height="60px" width="60px" class="icon" src="{{ '/storage/images/' . $auths->image_path }}" alt="{{ $auths->nickname }}" />
          @else
          <img height="60px" width="60px" class="icon" src="{{ asset('/storage/images/guest.jpeg') }}" alt="no image">
          @endif
        </div>
        
          <div align="left">
           <table class="top">
            <tr><td>name</td><td>{{ $auths->nickname??"ナナシ" }}</td></tr>
            <tr><td>frametype</td><td>{{ $auths->frametype??"不明" }}</td></tr>
            <tr><td>colortype</td><td>{{ $auths->colortype??"不明" }}</td></tr>
             <tr><td>hobby</td><td>{{ $auths->hobby??"・・・" }}</td></tr>
             <tr><td>likebrand</td><td>{{ $auths->likebrand??"・・・" }}</td></tr>
            </table>
            </div>
        
        
            <div class="col-md-4 offset-md-8"><a href="{{ url('/user/edit') }}">編集</a></div>
        
                <div class="col-md-6 offset-md-4">
                <a href="/user/create" class="btn_06" name="create"><span>投稿する</span></a>
                </div>
                 
                 
          @foreach($auths->posts as $post)
          <a href="{{ url('/corde/' . $post->id) }}">
          <img name="image" width="320" height="300" src="{{ secure_asset('/storage/images/' . $post->image_path) }}">
          </a>
          @endforeach
          
          <div class="col-md-12">
                     <a href="/main"><span>戻る</span></a>
                  </div>
  
  @endsection


  </div>
</div>