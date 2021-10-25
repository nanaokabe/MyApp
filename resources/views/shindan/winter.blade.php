@extends('layout.admin')
@section('title', 'ウィンタータイプ詳細')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-6">
      <h1>Winter Type・・・</h1>
    </div>
    <div class="col-md-12">ウィンタータイプにも４種類あります。下記の表から自分に当てはまるものを選び下記のフォームで登録しましょう！
    </div>
    
      <div class="col-md-3">
        <img src="{{asset('images/wintertype.jpeg')}}" alt="wintertype.jpeg" class="yourtype">
      </div>
        
        <div class="col-md-9">
          <table class="colortable" border="1">
            <tr>
            <th class="winter"><h4>Clear Winter</h4></th><th class="winter"><h4>Vivid Winter</h4></th>
            <th class="winter"><h4>Deep Winter</h4></th><th class="winter"><h4>Cool Winter</h4></th>
            </tr>
            <td>お肌は明るく艶やかで、髪色は暗く艶やか、白眼と黒目のコントラストが強い、澄んだ瞳</td>
            <td>お肌は明るい方も暗い方もいますが艶やか、瞳や髪は艶やかな黒で、白眼と黒目のコントラストが強い</td>
            <td>肌色は標準色〜濃い色、髪や瞳が黒々とされていて、お顔の彫りが深い方が多い</td>
            <td>お肌色は明るめの方も暗めの方もいますが艶やかで、髪や瞳は黒〜赤みのブラウンの方が多い</td>
            <tr><td colspan="4" class="yourcolor"><h5>your color</h5></td></tr>
            <td>明るく澄んだ色とコントラストの強い配色</td>
            <td>ブルーベースの最も鮮やかな色</td>
            <td>ブルーベースの深い色</td>
            <td>冷たい色。黒よりもネイビーが得意</td>
          </table>
        </div>
        
        <div class="col-md-10 offset-md-2">
        マイページに登録しましょう！（※ログインの必要があります）
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
                <option value="クリアウィンター">クリアーウィンター</option>
                <option value="ビビッドウィンター">ビビッドウィンター</option>
                <option value="ディープウィンター">ディープウィンター</option>
                <option value="クールウィンター">クールウィンター</option>
                </select>
                
                <input type="submit">
           </form>
          </div>
        

        <div class="col-md-10 offset-md-2">
        <img src="{{asset('images/yourcolor.jpeg')}}" alt="yourcolor.jpeg" class="colortype">
        </div>
        
        
        <button type="button"><a href="/main">メインページに戻る</a></button>
        
  </div>
</div>