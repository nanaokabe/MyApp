<!DOCYPE html>
<html>
  @extends('layout.admin')
 
      <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
 @section('title', '管理人のページ')
      </head>

@section('content')

<div class="container">
<div class="row">
<div class="col-md-12">
<button type="button"><a href="/admin/news/create">ニュースの新規作成</button>
</div></div></div>

<div class="container">
<div class="row">
<div class="col-md-12">
<button type="button"><a href="/admin/news">ニュース一覧</button>
</div></div></div>



<div class="container">
<div class="row">
<div class="col-md-12">
<button type="button"><a href="./main">トップページに戻る</a></button>
</div></div></div>