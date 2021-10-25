@extends('layout.admin')

@section('title', '新規投稿')

@section('content')

   <link href="{{ secure_asset('css/user.css') }}" rel="stylesheet">
   
       <form action="{{ action('User\UserController@store') }}" method="POST" enctype="multipart/form-data">
         {{ csrf_field() }}
        <div class="container">
         <div class="row">
           <div class="col-md-10 offset-md-2">投稿内容</div>
            <div class="col-md-10 offset-md-2">
  　           <textarea cols="100" rows="10" name="body"></textarea>
  　          </div>
  　         
  　       <input type="hidden" name="nickname" value="{{ $auths->nickname }}">
  　        <input type="hidden" name="user_id" value="{{ $auths->id }}">
            <input type="hidden" name="frametype" value="{{ $auths->frametype }}">
            <input type="hidden" name="colortype" value="{{ $auths->colortype }}">
  　       
  　       <div class="col-md-10 offset-md-2">
  　          <table>
  　            <th class="brandname">BRAND NAME</th>
  　             <tr><td>TOPS</td><td>:</td><td><input type="text" name="tops"></td></tr>
  　             <tr><td>INNES</td><td>:</td><td><input type="text" name="inner"></td></tr>
  　             <tr><td>BOTTOS</td><td>:</td><td><input type="text" name="bottom"></td></tr>
  　             <tr><td>SHOES</td><td>:</td><td><input type="text" name="shoes"></td></tr>
  　              </table>
  　         </div>
  　         
  
            @csrf
            <div class="col-md-10 offset-md-2">
              <input type="file" name="image" accept="image/png, image/jpeg">
            </div>
            
                <div class="col-md-6 offset-md-6">
                <input type="submit" value="Upload">
                </div>
            </div>
          </div>
        </div>
      </form>