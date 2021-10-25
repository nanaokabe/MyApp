@extends('layout.admin')
@section('title', 'コーデ詳細')
@section('content')


  <div class="container">
     <div class="row">
        <div class="nickname">

          {{ $posts->nickname }}さんのコーデ
        </div>
            <div class="col-md-9 offset-md-3">
              <div class="postimage">
                <img width="500px" height="600px" src="{{ secure_asset('storage/images/' . $posts->image_path) }}"></a>
              </div>
            </div>
            
              {{--いいね！--}}
              <div class="col-md-9 offset-md-3">
                 {{--もしいいねしてたら外す　nofavorites--}}
                @if(Auth::user()->isGood($posts->id))
                  <form action="{{ route('nofavorites') }}" method="POST" class="goodform">
                    <input type="hidden" name="post_id" value="{{ $posts->id }}" >
                         @csrf
                      <button type="submit" id="heart2" name="heart2" class="clear-decoration">
                        <div class="heart2"></div>
                      </button>
                  </form>
                @else
                  {{--もしいいねしてなかったらいいねする--}}
                   <form action="{{ route('favorites') }}" method="POST" class="goodform">
                    <input type="hidden" name="post_id" value="{{ $posts->id }}" >
                         @csrf
                      <button type="submit" id="heart" name="heart" class="clear-decoration">
                        <div class="heart"></div>
                      </button>
                  </form>
                @endif
  
                
                <span>いいね：{{ count($posts->goods) }}</span>
              </div>

                  {{--投稿内容--}}
                  <div class="col-md-9 offset-md-3">
                    <span>＠</span><span>{{ $posts->nickname }}</span>
                      <p>{{ $posts->body }}</p>
                      <table>
                      <tr><td>TOPS</td><td>:</td><td>{{ $posts->tops }}</td></tr>
                      <tr><td>INNER</td><td>:</td><td>{{ $posts->inner }}</td></tr>
                      <tr><td>BOTTOM</td><td>:</td><td>{{ $posts->bottom }}</td></tr>
                      <tr><td>SHOES</td><td>:</td><td>{{ $posts->shoes }}</td></tr>
                      </table>
                  </div>
                 
                    <div class="col-md-7 offset-md-5">
                      <span>frametype　</span><span>{{ $posts->frametype }}　　</span>
                      <span>colortype　</span><span>{{ $posts->colortype }}</span>
                      <div class="date col-md-8 offset-md-4">{{ $posts->created_at }}</div>
                    </div>
           
                       {{--コメント投稿欄--}}
                     <div class="commenttable">
                        <form method="POST" action="{{ route('addPost') }}">
                        @csrf
                          <div class="col-md-6 offset-md-6">
                            <label>COMMENT</label>
                                <input type="text" name="comment"/>
                                <input type="hidden" name="post_id" value="{{ $posts->id }}">
                                <input type="hidden" name="user_id" value="{{ $auths->id }}">
                                <input type="submit" value="OK" />
                              </div>
                          </div>
                        </form>
                      </div>
                  
                  {{--コメント表示欄--}}
                  @foreach($posts->comments as $comment)
                     <div class="col-md-9 offset-md-3">
                         <div class="cordecomments"> 
                          <img height="30px" width="30px" class="usericon" src="{{ '/storage/images/' . $comment->user->image_path }}" alt="{{ $comment->user->nickname }}" />
                            {{ $comment->user->nickname }}
                            {{ $comment->comment }}
                        </div>
                     </div>
                    @endforeach
              

                          <div class="return"><a href="/user">戻る</a></div>




     </div>
  </div>
    @endsection
    