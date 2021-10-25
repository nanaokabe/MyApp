@extends('layout.admin')
@section('title', 'サマータイプ詳細')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12"><h1>Summer Type・・・</h1>
    </div>
      <div class="col-md-12">サマータイプにも４種類あります。下記の表から自分に当てはまるものを選び下記のフォームで登録しましょう！
      </div>
      
        <div class="col-md-3">
        <img src="{{asset('images/summertype.jpeg')}}" alt="summertype.jpeg" class="yourtype">
        </div>
          
          <div class="col-md-9">
            <table class="colortable" border="1">
            <tr>
            <th class="summer"><h4>Light Summer</h4></th><th class="summer"><h4>Bright Summer</h4></th>
            <th class="summer"><h4>Muted Summer</h4></th><th class="summer"><h4>Cool Summer</h4></th>
            </tr>
            <td>肌はとても白く、<br>瞳や髪がとても明るいか<br>グレーがかった髪色をしている方が多い</td>
            <td>肌が白く、瞳や髪は艶やかな<br>赤みのブラウンで肌色との<br>コントラストのある方が多い</td>
            <td>肌は明るい方も暗めの方も<br>すりガラスのような<br>マットな質感が特徴<br>髪もアッシュ系や<br>ソフトな赤みの<br>ブラウンの方が多い</td>
            <td>肌は明るめの方も<br>暗めの方も艶やかで<br>髪や瞳はやや明るめの<br>赤みのブラウン<br>の方が多い</td>
            <tr><td colspan="4" class="yourcolor"><h5>your color</h5></td></tr>
            <td>ブルーベースの<br>薄いパステルカラー</td>
            <td>ブルーベースの明るい色<br>多少くすんだ色も着こなせる<br>澄んだ色の方がより得意</td>
            <td>ブルーベースの<br>グレーがかった<br>ニュアンスカラー</td>
            <td>冷たい色</td>
            </table>
          </div>

            <div class="col-md-6 offset-md-2">
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
                    <option value="ライトサマー">ライトサマー</option>
                    <option value="ブライトサマー">ブライトサマー</option>
                    <option value="ミューテッドサマー">ミューテッドサマー</option>
                    <option value="クールサマー">クールサマー</option>
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