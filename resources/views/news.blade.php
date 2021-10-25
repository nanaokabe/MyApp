@extends('layout.admin')

@section('title', 'ニュース一覧')

@section('content')

    <div class="container">
      <div class="row">
       @if (count($posts)>0)
       @foreach ($posts as $news)
      
          <p>
            <img width="320" height="180" align="left" src="{{ secure_asset('storage/images/' . $news->image_path) }}">
                <b><h7>{{ $news->title }}</h7></b><br>
                {{ Str::limit($news->body,500) }}<br>
                {{ $news->created_at }}
                
          </p>
      
    @endforeach
  @endif
@endsection

      </div>
    </div>
  </div>