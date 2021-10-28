@extends('layout.admin')
@section('title', 'お悩み詳細')
@section('content')


<div class="container">
  <div class="row">
    <div class="col-md-9 offset-md-3">
      <span>＠</span><span>{{ $auths->nickname }}</span>
        <p>{{ $troubles->body }}</p>
        <p>{{ $troubles->created_at }}</p>
      
          @if(isset($troubles->image_path01))
          <img name="image" width="200" height="180" src="{{ secure_asset($troubles->image_path01) }}">
          @endif
          
          @if(isset($troubles->image_path02)) 
          <img name="image" width="200" height="180" src="{{ secure_asset($troubles->image_path02) }}">
          @endif
          
          @if(isset($troubles->image_path03)) 
          <img name="image" width="200" height="180" src="{{ secure_asset($troubles->image_path03) }}">
          @endif
    </div>
          
          
                       {{--コメント投稿欄--}}
                     <div class="commenttable">
                        <form method="POST" action="{{ route('addPosts') }}">
                        @csrf
                          <div class="col-md-6 offset-md-6">
                            <label>COMMENT</label>
                                <input type="text" name="comment"/>
                                <input type="hidden" name="trouble_id" value="{{ $troubles->id }}">
                                <input type="hidden" name="user_id" value="{{ $auths->id }}">
                                <input type="submit" value="OK" />
                              </div>
                          </div>
                        </form>
                      </div>
                  
                  {{--コメント表示欄--}}
                  @foreach($troubles->comments as $comment)
                     <div class="col-md-9 offset-md-3">
                         <div class="cordecomments"> 
                          <img height="30px" width="30px" class="usericon" src="{{$comment->user->image_path }}" alt="{{ $comment->user->nickname }}" />
                            {{ $comment->user->nickname }}
                            {{ $comment->comment }}
                        </div>
                     </div>
                    @endforeach
  
              

                          <div class="return"><a href="/trouble">戻る</a></div>

  </div>
</div>
@endsection
