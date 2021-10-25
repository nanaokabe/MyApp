<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\TroubleController;
use App\News;
use App\Trouble;
use App\Post;
use App\User;
use App\Shindan;
use Storage;
use Auth;

class MainController extends Controller
{
    
    public function index ()
    {
        
        $auths=Auth::user();

        $troubles = Trouble::all()->SortByDesc('updated_at');
        $troubles = Trouble::paginate(3);
 
        $news = News::all()->SortByDesc('updated_at');
         $news = News::paginate(3);
         
        $corde = Post::all()->SortByDesc('created_at');
         $corde = Post::paginate(6);
        
        return view('main', [
            'troubles'=>$troubles,
            'news'=>$news,
            'corde'=>$corde,
            'auths' => $auths,
            ]);
    }
    
    
    /* public function show(User $user)
    {
        $user = User::find($user->id); //idが、リクエストされた$userのidと一致するuserを取得
        $posts = Post::where('id', $user->id) //$userによる投稿を取得
            ->orderBy('created_at', 'desc') // 投稿作成日が新しい順に並べる
            ->paginate(10); // ページネーション; 
        return view('users.show', [
            'user_name' => $user->name, // $user名をviewへ渡す
            'posts' => $posts, // $userの書いた記事をviewへ渡す
        ]);
    }*/
    
    
    
    public function frame (Request $request)
    {   
        $output01 = $output02 = $output03 = null;
        
        return view('shindan.frame', compact('output01', 'output02', 'output03'));
    }
    
    
    public function store (Request $request)//submit押したらABCのそれぞれのチェックの数をかぞえる
    {
        $output01 = $output02 = $output03 = null;
        
        $A = $request->A;
        if(!is_null($A)){
            $output01 = count($A);
        }
        
         $B = $request->B;
        if(!is_null($B)){
            $output02 = count($B);
        }
        
         $C = $request->C;
        if(!is_null($C)){
            $output03 = count($C);
        }
    
        return view('shindan.frame', compact('output01', 'output02', 'output03'));
    }
    
    
    
    public function color (Request $request)
    {
        $output01 = $output02 = $output03 = $output04 = null;
        
        return view('shindan.color', compact('output01', 'output02', 'output03', 'output04' ));
    }
    
    
    
      public function colorstore (Request $request)//submit押したらABCのそれぞれのチェックの数をかぞえる
    {
        $output01 = $output02 = $output03 = $output04 = null;
        
        $A = $request->A;
        if(!is_null($A)){
            $output01 = count($A);
        }
        
         $B = $request->B;
        if(!is_null($B)){
            $output02 = count($B);
        }
        
         $C = $request->C;
        if(!is_null($C)){
            $output03 = count($C);
        }
    
        $D = $request->D;
        if(!is_null($D)){
            $output04 = count($D);
        }
    
    
        return view('shindan.color', compact('output01', 'output02', 'output03','output04'));
    }
    
        
    
    
    public function spring ()
    {
        return view('shindan.spring');
    }
    
    public function summer ()
    {
        return view('shindan.summer');
    }
    
    
    public function autumn ()
    {
        return view('shindan.autumn');
    }
    
    public function winter ()
    {   
        $auths=Auth::user();
        return view('shindan.winter', ['auths'=>$auths]);
    }
    
    
    public function news (){
      
      $auths = Auth::user();
      $posts = News::all()->SortByDesc('created_at');
      
       return view('news',['posts'=>$posts, 'auths'=>$auths]);
      
    }
    
    public function add (Request $request) 
    {
        $form = $request->all();
        $auths = Auth::user();

        unset($form['_token']);
    
        $auths->fill($form)->save();

        return redirect('/user');
    }
    
    
    public function search(Request $request) 
    {
        //$query = Post::query();
        $auths = Auth::user();
        $keyword = $request->input('keyword');
        $cordinates = Post::where('frametype', 'like', '%' . $keyword . '%')
          ->orwhere('nickname', 'like', '%' . $keyword . '%')
          ->orwhere('colortype', 'like', '%' . $keyword . '%')
          ->orwhere('tops', 'like', '%' . $keyword . '%')
          ->orwhere('bottom', 'like', '%' . $keyword . '%')
          ->orwhere('inner', 'like', '%' . $keyword . '%')
          ->orwhere('shoes', 'like', '%' . $keyword . '%')
          ->orwhere('body', 'like', '%' . $keyword . '%')
          ->groupBy('id')->get();
        
        
        /*$cordinates = Post::where('frametype', 'like', '%'. 'ウェーブ' . '%')->get();*/        
 
        return view('search', compact('cordinates', 'keyword', 'auths'));
        
    }
    
}
