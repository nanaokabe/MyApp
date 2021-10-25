@extends('layout.admin')
@section('title', 'お悩み投稿')
@section('content')

<div class="container">
  <div class="row">
        
      
    <form action="{{ action('TroubleController@store') }}" method="POST" enctype="multipart/form-data">
        
        {{ csrf_field() }}
        <!-- 投稿のタイトル -->
          <table>
              <tr><td>投稿者</td><td>:</td><td>{{ $auths->nickname }}</td>
              </tr>
              <tr><td>本文</td><td>:</td></tr>
          </table>
          
            <textarea name="body" cols="80%" rows="10"></textarea>
             <input type="hidden" name="user_id" value="{{ $auths->id }}">
             
              @csrf
              <p><input type="file" name="image[]" accept="image/png, image/jpeg" multiple="multiple">
                 <input type="submit" value="Upload">
              </p>
          
    </form>
    
          
    </div>
</div>