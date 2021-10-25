@extends('layout.admin')
@section('title', 'オータムタイプ詳細')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-6"><h1>Autumn Type・・・</h1>
    </div>
      <div class="col-md-12">オータムタイプにも４種類あります。下記の表から自分に当てはまるものを選び下記のフォームで登録しましょう！
      </div>

      <div class="col-md-3">
      <img src="{{asset('images/autumntype.jpeg')}}" alt="autumntype.jpeg" class="yourtype">
      </div>
      
      <div class="col-md-9">
        <table class="colortable" border="1">
          <tr>
          <th class="autumn"><h4>Strong Autumn</h4></th><th class="autumn"><h4>Muted Autumn</h4></th>
          <th class="autumn"><h4>Deep Autumn</h4></th><th class="autumn"><h4>Warm Autumn</h4></th>
          </tr>
          <td>お肌は黄みを含んだ<br>標準色からやや暗め<br>瞳や髪が艶やかな黒</td>
          <td>肌は標準色〜濃い色で<br>髪、瞳ともに<br>ダークブラウンや<br>黒といった暗いお色<br>お顔の彫が深い方が多い</td>
          <td>肌は明るい方も暗めの方も<br>マットな質感。髪は<br>グリーンがかっていたり<br>ソフトなブラウンが多い</td>
          <td>お肌色は標準色〜日焼けした<br>ような小麦色で、髪や瞳は<br>ブラウンの方が多い<br>エキゾチック、ゴージャス<br>な印象。</td>
          <tr><td colspan="4" class="yourcolor"><h5>your color</h5></td></tr>
          <td>イエローベースの<br>原色に黒を少し足した<br>ようなこっくりと強い色</td>
          <td>イエローベースの深い色</td>
          <td>イエローベースのグレー<br>がかったニュアンスカラー</td>
          <td>温かい色</td>
        </table>
      </div>
     
        <div class="col-md-10 offset-md-2">
        マイページに登録しましょう！
        </div>
        
         <div class="col-md-9 offset-md-3">
            <form method="post" action="{{ route('add') }}" enctype="multipart/form-data">
              
                       {{ csrf_field() }}
              <span class="selectbox">骨格タイプ　：</span>
               <select name="frametype">
                  <option value="ストレート">ストレート</option>
                  <option value="ウェーブ">ウェーブ</option>
                  <option value="ナチュラル">ナチュラル</option>
               </select>
               
              <span class="selectbox">カラータイプ　：</span>
                <select name="colortype">
                  <option value="ストロングオータム">ストロングオータム</option>
                  <option value="ミューテッドオータム">ミューテッドオータム</option>
                  <option value="ディープオータム">ディープオータム</option>
                  <option value="ウォームオータム">ウォームオータム</option>
                </select>
                
                <input type="submit">
          　</form>
          </div>
              
              <div class="col-md-10 offset-md-2">
               <img src="{{asset('images/yourcolor.jpeg')}}" alt="yourcolor.jpeg" class="colortype">
              </div>
              
              
              <button type="button"><a href="../index">メインページに戻る</a></button>
    
  </div>
</div>