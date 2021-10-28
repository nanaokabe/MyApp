@extends('layout.admin')
@section('title', 'パーソナルカラー診断')
@section('content')

 <link href="{{ secure_asset('css/frame.css') }}" rel="stylesheet">

  <div class="container">
  	<div class="row">
      <div class="col-md-12">  
			パーソナルカラーは、「イエベ・ブルベ」のアンダートーンで分けた2分割や、<br>
			「スプリング・サマー・オータム・ウィンター」のシーズンで分けた4分割が基本になります。<br>
			その上で、流派によってさらに細分化したものが存在し、6分割、12分割、16分割、24分割・・・と分かれています。<br>
			今回は細分化された中で最も有名である、16分割の「16タイプカラーメソッド®」で最終的に診断をしていきます。<br>
			<br>
			パーソナルカラーを身につけると、肌色・顔色が明るく見えたり、<br>
			似合う服、メイクカラーに出会えたり様々なメリットがいっぱいです♪<br>
			それでは早速、下記の質問に答えていきましょう！<br>
			</div>

			 <form method="POST" action="{{ route('colorstore') }}">
          @csrf
				
				<div class="quiz">
				<h4>Q1,肌のタイプ</h4>
					<label><input type="checkbox" name="A[]" value="A"> A.  肌が薄く血色が出やすい、透明感のある肌。そばかすができやすい。</label></br>
					<label><input type="checkbox" name="B[]" value="B"> B.  マットな肌質、肌が薄く血色が出やすい方が多い。日焼けすると一時的に赤くなる。</label></br>
					<label><input type="checkbox" name="C[]" value="C"> C.	 マットな質感であまり血色がない方が多い。日焼けするとしっかり残りやすい。</label></br>
					<label><input type="checkbox" name="D[]" value="D"> D.  肌が薄く血色が出やすい、透明感のある肌。そばかすができやすい。</label><br></br>
				</div>
					
					
				<div class="quiz">
				<h4>Q2,髪の毛のタイプ</h4>
					<label><input type="checkbox" name="A[]" value="A"> A.  艶のある黒髪から明るいブラウン</label></br>
					<label><input type="checkbox" name="B[]" value="B"> B.  ソフトな髪質、真っ黒よりも少しグレイッシュ感のあるタイプや、赤みのある茶色。</label></br>
					<label><input type="checkbox" name="C[]" value="C"> C.	 ダークブラウンやブラックに近いカラーで、髪質がややマット</label></br>
					<label><input type="checkbox" name="D[]" value="D"> D.  ツヤのある黒髪の方が多く、茶色でも暗めでツヤ感がある。染めるよりも黒髪が似合う</label></br>
				</div>
					
				<div class="quiz">
				<h4>Q3,瞳のタイプ</h4>
					<label><input type="checkbox" name="A[]" value="A"> A.  明るいブラウンから濃いブラウンまで。黒目と白目の境目がくっきりしている</label></br>
					<label><input type="checkbox" name="B[]" value="B"> B.  黒目と白目の境目がソフトな印象</label></br>
					<label><input type="checkbox" name="C[]" value="C"> C.	 目の色はブラウン系のダークカラー</label></br>
					<label><input type="checkbox" name="D[]" value="D"> D.  黒目と白目の境目がハッキリとしている。黒目が濃く印象的</label></br>
				</div>
				
				
				<div class="quiz">
				<h4>Q4,頬のタイプ</h4>
					<label><input type="checkbox" name="A[]" value="A"> A.  ピーチピンク（オレンジがかったピンク）の方が多い</label></br>
					<label><input type="checkbox" name="B[]" value="B"> B.  血色が出やすく、青みのピンクみかかっている。</label></br>
					<label><input type="checkbox" name="C[]" value="C"> C.	 あまり血色がないのですが、ややオレンジピンク系の頬の色</label></br>
					<label><input type="checkbox" name="D[]" value="D"> D.  血色が少ない方や青みのピンクみがある方もいる</label></br>
				</div>
				
				 <input type="submit" value="カウントする" >
				
				  <div class="count">一番多かったアルファベットをクリックしてね！</div>
					  <table class="result">
		      		<tbody>
		          <tr>
		          	<th><a href="#springtype">A</a></th>
		          	<th><a href="#summertype">B</a></th>
		          	<th><a href="#autumntype">C</a></th>
		          	<th><a href="#wintertype">D</a></th>
		          </tr>
		          <tr>
		          	<td>{{ $output01 }}</td><td>{{ $output02 }}</td><td>{{ $output03 }}</td><td>{{ $output04 }}</td>
		          	</tr>
		        </table>
		         </tbody>
		  	</form>
					
					<div class="type">
							<h1 id="springtype">診断結果・・・</h1>
							<h1>あなたは「スプリングタイプ」です！</h1>
						<img src="{{ asset('images/spring.PNG') }}" alt="spring.png" class="typeimage">
					</div>
						
						<div class="col-md-4 offset-md-2">
							<a href="color/spring" name="color" class="color"><button type="button" class="buttonnext">▶︎　Next 詳細を見る</a></button>
						</div>
							
							
								<div class="type">
								<h1 id="summertype">診断結果・・・</h1>
								<h1>あなたは「サマータイプ」です！</h1>
								<img src="{{ asset('images/summer.PNG') }}" alt="summer.png" class="typeimage">
								</div>
									<div class="col-md-4 offset-md-2">
									<a href="color/summer" class="color"><button type="button" class="buttonnext">▶︎　Next 詳細を見る</a></button>
									</div>
									
										<div class="type">
											<h1 id="autumntype">診断結果・・・</h1>
											<h1>あなたは「オータムタイプ」です！</h1>
										<img src="{{ asset('images/autumn.PNG') }}" alt="autumn.png" class="typeimage">
										</div>
											<div class="col-md-4 offset-md-2">
											<a href="color/autumn" class="color"><button type="button" class="buttonnext">▶︎　Next 詳細を見る</a></button>
											</div>
											
												<div class="type">
													<h1 id="wintertype">診断結果・・・</h1>
													<h1>あなたは「ウィンタータイプ」です！</h1>
												<img src="{{ asset('images/winter.PNG') }}" alt="winter.png" class="typeimage">
												</div>
												<div class="col-md-4 offset-md-2">
												<a href="color/winter" class="color"><button type="button" class="buttonnext">▶︎　Next 詳細を見る</a></button>
												</div>
											
			</div>
	</div>
