@extends('layout.admin')
@section('title', '骨格診断')
@section('content')

<div class="container">
  <div class="row">
    <div class="col-md-12">  
    あなたは「ストレート」「ウェーブ」「ナチュラル」
    どのタイプ？さっそくセルフチェックしてみましょう。
    </div>
    
    <div class="col-md-12">
        <form method="POST" action="{{ route('store') }}">
          @csrf
          <div class="quiz">
            <h4>Q1,胸板の厚みは？</h4>
            <label><input type="checkbox" name="A[]" value="A"> A.  厚みがあり立体的、バストトップ高め</label><br>
          	<label><input type="checkbox" name="B[]" value="B"> B.  厚みがなく平面的、バストトップは低め</label><br>
          	<label><input type="checkbox" name="C[]" value="C"> C.	厚みもよりも、肩のラインや骨が目立つ</label><br>
          </div>
          
            <div class="quiz">
            <h4>Q2,筋肉や脂肪のつき方は？</h4>
            	<label><input type="checkbox" name="A[]" value="A"> A.  筋肉がつきやすく、二の腕や太ももの前の筋肉が張りやすい</label><br>
            	<label><input type="checkbox" name="B[]" value="B">B.  筋肉がつきにくく、下半身に脂肪がつきやすい</label><br>
            	<label><input type="checkbox" name="C[]" value="C">C.	筋肉よりも骨格や関節のしっかり感、骨太さが目立つ</label><br>
            </div>
            
            <div class="quiz">
              <h4>Q3,首から肩にかけてのラインは？</h4>
              <label><input type="checkbox" name="A[]" value="A"> A.  首はやや短めで、肩まわりに厚みがある</label><br>
              <label><input type="checkbox" name="B[]" value="B"> B.  首は長めで細く、肩まわりが華奢で薄い</label><br>
              <label><input type="checkbox" name="C[]" value="C"> C.	首は長めで、首の筋がしっかり見える</label><br>
            </div>
              
            <div class="quiz">
              <h4>Q4,鎖骨の見え方は？</h4>
              <label><input type="checkbox" name="A[]" value="A"> A.  あまり目立たない</label><br>
              <label><input type="checkbox" name="B[]" value="B"> B.  うっすらと出ているが、骨は小さい</label><br>
              <label><input type="checkbox" name="C[]" value="C"> C.	はっきりと出ていて、骨が大きい</label><br>
            </div>
                
            <div class="quiz">
              <h4>Q5,肌の質感は？</h4>
              <label><input type="checkbox" name="A[]" value="A"> A.  弾力とハリのある質感</label><br>
              <label><input type="checkbox" name="B[]" value="B"> B.  ふわふわと柔らかい質感</label><br>
              <label><input type="checkbox" name="C[]" value="C"> C.	皮膚が硬めで関節や筋が目立つ</label><br>
            </div>
                  
            <div class="quiz">
            <h4>Q6,腰からおしりのシルエットは？肌の質感は？</h4>
            	<label><input type="checkbox" name="A[]" value="A"> A.  腰の位置が高めで、腰まわりが丸い</label><br>
            	<label><input type="checkbox" name="B[]" value="B"> B.  腰の位置が低めで、腰が横に広がっている</label><br>
            	<label><input type="checkbox" name="C[]" value="C"> C.	腰の位置が高めで、おしりが平板で細長い</label><br>
            </div>
            
            <div class="quiz">
            <h4>Q7,着るとほめられるアイテムは？</h4>
            	<label><input type="checkbox" name="A[]" value="A"> A.  シンプルなVネックニット・コットンシャツ・テーラードジャケット・センタープレスパンツ・膝丈タイトスカート</label><br>
            	<label><input type="checkbox" name="B[]" value="B"> B.  ふんわりブラウス・ビジュー付きニット・フレアスカート・ストレッチパンツ</label><br>
            	<label><input type="checkbox" name="C[]" value="C"> C.	麻シャツ・ざっくりニット・ロングスカート・デニム</label><br>
            </div>
            
            <div class="quiz">
            <h4>Q8,苦手なアイテムは？</h4>
            	<label><input type="checkbox" name="A[]" value="A"> A. チュニック・ハイウエスト切り替え服・シワ加工やダメージ加工・重ね着コーデ</label><br>
            	<label><input type="checkbox" name="B[]" value="B"> B.  シンプルなVネック・ローウエスト切り替え・デニムやワイドパンツ・着丈の長い服</label><br>
            	<label><input type="checkbox" name="C[]" value="C"> C.	かっちりしたスーツ・身体にぴったりする服・シンプルで小さい靴・着丈の短い服</label><br>
            </div>
            
            <input type="submit" value="カウントする" >
        </form>
            
              <div class="count">一番多かったアルファベットをクリックしてね！</div>
                <table class="result">
                  <tbody>
                   <tr><th><a href="#sttype">A</a></th>
                       <th><a href="#watype">B</a></th>
                       <th><a href="#nttype">C</a></th>
                   </tr>
                   <tr>
                     <td>{{ $output01 }}</td>
                     <td>{{ $output02 }}</td>
                     <td>{{ $output03 }}</td>
                   </tr>
                  </tbody>
                </table>
    
         
                  <div class="type">
                  	<h1 id="sttype">診断結果・・・</h1>
                    <h1>あなたは「骨格ストレートタイプ」です！</h1>
                    <img src="{{ asset('images/straight.jpg') }}" alt="straight" class="typeimage">
                  </div>
                  
                  <button type="button" class="buttonnext offset-md-2">
                    <a href="color" class="color">▶︎　Next パーソナルカラー診断をする</a></button>
              
                
                  <div class="type">
                  	<h1 id="watype">診断結果・・・</h1>
                    <h1>あなたは「骨格ウェーブタイプ」です！</h1>
                    <img src="{{ asset('images/wave.jpg') }}" alt="wave" class="typeimage">
                  </div>
                     <button type="button" class="buttonnext offset-md-2">
                       <a href="color" class="color">▶︎　 Next パーソナルカラー診断をする</a></button>
                  
                  <div class="type">
                     <h1 id="nttype">診断結果・・・</h1>
                     <h1>あなたは「骨格ナチュラルタイプ」です！</h1>
                     <img src="{{ asset('images/natural.jpg') }}" alt="natural" class="typeimage">
                  </div>
                      
                      <button type="button" class="buttonnext offset-md-2">
                        <a href="color" class="color">▶︎　Next パーソナルカラー診断をする</a>
                      </button>
                      
              
    </div>
  </div>
</div>
