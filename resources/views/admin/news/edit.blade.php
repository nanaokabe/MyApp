@extends('layout.admin')

@section('title', 'ニュース編集')

@section('content')

<div class="container">
  <div class="row">
        

        <form method="post" action="{{ action('Admin\MainController@update') }}" enctype="multipart/form-data">
           {{ csrf_field() }}
      
           <label class="col-md-12" for="title">タイトル</label>
           <div class="col-md-12">
               <input class="form-input__input" name="title" value="{{ $news_form->title }}">
           </div>
          
           <label class="col-md-12" for="body">本文</label>
           <div class="col-md-12">
               <textarea class="form-control" name="body" rows="20">{{ $news_form->body }}</textarea>
          </div>
           
           <label class="col-md-12" for="image">画像</label>
           <div class="col-md-12">
              <input type="file" name="image">
           </div>
           <div class="col-md-12">設定中: </div>
           <div class="col-md-12">
           <img width="320" height="180" src="{{ $news_form->image_path }}">
           </div>
             <label class="form-check-label">
                <input type="checkbox" class="form-check-input" name="remove" value="true">画像を削除
             </label>
                          

             <input type="hidden" name="id" value="{{ $news_form->id }}">

             <div class="col-md-12">
                {{ csrf_field() }}
              <input type="submit" class="btn btn-primary" value="更新">
             </div>
        </form>
        
           
           
      
  </div>
</div>