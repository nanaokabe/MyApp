<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\History;
use Carbon\Carbon;
use Storage;
use Auth;
use Validator;

class MainController extends Controller
{
  
  public function top()//管理人用ニュース一覧画面トップ
  {
    $posts = News::all()->SortByDesc('created_at');
    return view('admin.main',['posts'=>$posts]);
  }
  
  public function create()//新規投稿画面の表示
  {
    return view('admin.news.create');
  }
  
  
      public function store(Request $request) //ニュース投稿保存
    {
        $posts = new News;
        $posts->title = $request->title;
        $posts->body = $request->body;
        $form = $request->all();
        //dd($form)
        
    // formに画像があれば、保存する
      if (isset($form['image'])) {
        $path = Storage::disk('s3')->putFile('/',$form['image'],'public');
        $posts->image_path = Storage::disk('s3')->url($path);
        
      } else {
          $posts->image_path = null;
      }

      //$posts->fill($form);
      $posts->save();
      return redirect('admin');
      
  }

      public function edit(Request $request) {  //ニュース編集画面の表示

          $news = News::find($request->id);
             return view('admin.news.edit',['news_form'=>$news]);
    }
    
    
    
        //ニュース編集を保存
  public function update(Request $request)
  {
      // News Modelからデータを取得する
      $news = News::find($request->id);
      // 送信されてきたフォームデータを格納する
      $news_form = $request->all();
      
      //
         $news_form = $request->all();
      if ($request->remove == 'true') {
          $news_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = Storage::disk('s3')->putFile('/',$news_form['image'],'public');
          $news_form['image_path'] = Storage::disk('s3')->url($path);
      } else {
          $news_form['image_path'] = $news->image_path;
      }

      unset($news_form['image']);
      unset($news_form['remove']);
      unset($news_form['_token']);
      // 該当するデータを上書きして保存する
      $news->fill($news_form)->save();
      return redirect('admin');
      
      
      /*if ($request->remove == 'true') {
          $news_form['image_path'] = null;
      } elseif ($request->file('image')) {
          $path = Storage::disk('s3')->putFile('/',$news_form['image'],'public');
          $news->image_path = Storage::disk('s3')->url($path);
      } else {
          $news_form['image_path'] = $news->image_path;
        
// 該当するデータを上書きして保存する
      dd($news_form);
      $news->fill($news_form)->save(); 
      }
      
      return redirect('admin');
      */
      
  }
  
  
  
  
  
  
  
  
  
  
    
    public function index(){
      $posts = News::all()->SortByDesc('created_at');
      
       return view('news',['posts'=>$posts]);
      
    }
   


}