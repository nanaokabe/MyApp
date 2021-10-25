@extends('layout.admin')

@section('title', 'プロフィール編集')

@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12"><h3>プロフィール編集</h3></div>
    
    <form method="post" action="{{ route('update') }}" enctype="multipart/form-data">
     
     {{ csrf_field() }}
     
     <div class="col-md-12">プロフィール写真</div>
        <div class="col-md-12"><input class="form-input__input" type="file" name="image" value="{{$auth->image_path}}">
        </div>
    
      <div class="col-md-12">ニックネーム</div>
        <div class="col-md-12"><input class="form-input__input" type="text" name="nickname" value="{{$auth->nickname}}">
        </div>
        
         <div class="col-md-12">メールアドレス</div>
        <div class="col-md-12"><input type="email" name="email" value="{{$auth->email}}">
        </div>
        
         <div class="col-md-12">骨格タイプ</div>
        <div class="col-md-12"><input class="form-input__input" type="text" name="frametype" value="{{$auth->frametype}}">
        </div>
        
         <div class="col-md-12">カラータイプ</div>
        <div class="col-md-12"><input class="form-input__input" type="text" name="colortype" value="{{$auth->colortype}}">
        </div>
        
        <div class="col-md-12">趣味</div>
        <div class="col-md-12"><input class="form-input__input" type="text" name="hobby" value="{{$auth->hobby}}">
        </div>
        
        <div class="col-md-12">好きなブランド</div>
        <div class="col-md-12"><input class="form-input__input" type="text" name="likebrand" value="{{$auth->likebrand}}">
        </div>
        
      
        <div class="col-md-12">
        <input class="send" type="submit" value="編集">
        </div>
      
      </form>
  </div>
</div>