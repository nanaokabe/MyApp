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
  
  public function top()
  {
    return view('admin.main');
  }
  
  public function create()
  {
    return view('admin.news.create');
  }
  
  
      public function store(Request $request) //投稿保存
    {
        $posts = new News;
        $posts->title = $request->title;
        $posts->body = $request->body;
        $form = $request->all();
        //dd($form)
        
    // formに画像があれば、保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/images');
        $posts->image_path = basename($path);
      } else {
          $posts->image_path = null;
      }

      //$posts->fill($form);
      $posts->save();

      return redirect('admin/news');
      
      
  }

  
    
    public function index(){
      $posts = News::all()->SortByDesc('created_at');
      
       return view('news',['posts'=>$posts]);
      
    }
   


}