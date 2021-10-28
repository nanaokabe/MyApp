@extends('layout.admin')
@section('title', 'メインページ')
@section('content')

<div class="container">
  <div class="row">
    
      <div class="col-md-2 offset-md-4">
       <div class="sindan">パーソナルカラー<br>骨格診断</div>
      </div>
      
      <div class="col-md-6">
      <a href="frame" class="btn-flat-border">診断する</a>
      </div>
      
      
      <div class="col-md-12">新着ニュース</div>
      
      @if (count($news) > 0)
        @foreach ($news as $news)
          <table class="newstable">
            <tr>
              <td>
                <a href="news">
                 <img width="300" height="150" src="{{ secure_asset($news->image_path) }}">
              </td>
            </tr>
            <tr>
              <td>
                 <div class="newspost">{{ Str::limit($news->title,40) }}</div>
                </a>
              </td>
            </tr>
          </table>
        @endforeach
      @endif
 
              
              
              <div class="col-md-7 offset-md-5">
                <a href="news" class="btn-border-bottom">ニュースをもっと見る       　       ▽</a>
               </div>
                
                
                <div class="col-md-4 offset-md-8">
                  <form action="{{ action('MainController@search') }}" name="search" method="GET" >
                        <input type="search" value="{{ request('search') }}" size="25" placeholder="コーディネートを探す" name="keyword" aria-label="検索...">
                    <input type="submit" value="検索">
                  </form>
                </div>
                      
                 <div class="col-md-12">今日のコーデ</div>
                      @foreach($corde as $post)
                        <div class="col-md-4">
                            <p class="cordinateimage">
                              <a href="{{ url('/corde/' . $post->id) }}">
                              <img name="image" width="300" height="350" src="{{ secure_asset($post->image_path) }}">
                              </a>
                            </p>
                        </div>
                      @endforeach
                      
                      <div class="col-md-7 offset-md-5">みんなのお悩みコーナー</div>
                       
                       <div class="hatena col-md-1 offset-md-2">
                         <a href="/trouble" class="btn-circle-border-double">?</a>
                        </div>
                        
                        <div class="col-md-6">
                          <div class="soudan">
                            <form action="{{ action('MainController@index') }}" method="get">
                              @if (count($troubles) > 0)
                                @foreach ($troubles as $trouble)
                                  <div class="balloon1">
                                  {{ Str::limit($trouble->body,50) }}<br>
                                  </div>
                                @endforeach
                               @endif
                            </form>
                          </div>
                        </div>
                                
    </div>
</div>
                              
                              
