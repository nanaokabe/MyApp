@extends('layout.admin')
@section('title', 'お悩み相談')
@section('content')

<body class="troublebody">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <a href="{{ action('TroubleController@create') }}" role="button" class="btn_05">ちょっと相談！</a>
      </div>
      
            @foreach($troubles as $trouble)
            <div class="col-md-9 offset-md-3">
              <a href="{{ url('/trouble/index/' . $trouble->id ) }}">
                <div class="troubletable">
                   <img height="30px" width="30px" class="usericon" src="{{$auths->image_path }}" alt="{{ $auths->nickname }}" />
                      <div>{{ $auths->nickname }}<span>：</span><span>{{ $auths->frametype }}</span>
                      </div>
                     <p>{{ $trouble->body }}</p>
                     <p class="date offset-md-7">{{ $trouble->created_at }}</p>
                </div>
              </a>
            </div>
           @endforeach
         
          
            
            <div class="col-md-12">
                <a href="{{ url('/main') }}" role="button">トップページに戻る</a>
            </div>
              
          
    </div>
  </div>
</body>