@extends('layout.admin')
@section('title', 'スプリングタイプ詳細')
@section('content')

  <div class="container">
    <div class="row">
      <div class="col-md-6"><h1>Spring Type・・・</h1>
      </div>
        <div class="col-md-12">スプリングタイプにも４種類あります。下記の表から自分に当てはまるものを選び下記のフォームで登録しましょう！
        </div>

          <div class="col-md-3">
             <img src="{{asset('images/springtype.jpeg')}}" alt="springtype.jpeg" class="yourtype">
          </div>
      
              <div class="col-md-9">
                <table class="colortable" border="1">
                  <tr>
                    <th class="light"><h4>Light Spring</h4></th><th class="light"><h4>Bright Spring</h4></th><th class="light"><h4>Vivid Spring</h4></th><th class="light"><h4>Warm Spring</h4></th>
                  </tr>
                    <td>肌はとても白く、<br>瞳や髪もとても明るい色</td>
                    <td>肌が白く、<br>瞳や髪は艶やかなこげ茶色で<br>肌色とのコントラストがある</td>
                    <td>肌色は明るい方も暗めの方も。<br>艶やかでハリがあり<br>瞳と髪が黒黒としている</td>
                    <td>肌色は明るい方も暗めの方も。<br>黄みをたっぷり含んでいて、<br>髪や瞳もブラウン</td>
                    
                  <tr>
                    <td colspan="4" class="yourcolor"><h5>your color</h5></td>
                  </tr>
                  
                    <td>イエローベースの<br>薄いパステルカラー</td>
                    <td>イエローベースの<br>明るく澄んだ色</td>
                    <td>イエローベースの<br>鮮やかな色</td>
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
                          <option value="ライトスプリング">ライトスプリング</option>
                          <option value="ブライトスプリング">ブライトスプリング</option>
                          <option value="ビビッドスプリング">ビビッドスプリング</option>
                          <option value="ウォームスプリング">ウォームスプリング</option>
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