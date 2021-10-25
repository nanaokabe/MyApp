<?php
namespace App\Http\Controllers\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Comment;
use App\User;
use App\Good;
use App\History;
use Carbon\Carbon;
use Storage;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     //マイページ表示
    public function index()
    {   
        $auths=Auth::user();

        return view('users.myinfo', [
            'auths' => $auths,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     
     //コーデ投稿ページ表示
    public function create()
    {
        $auths = Auth::user();
       return view('users.create',['auths' => $auths ]);
    
    }
    
     public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $requests
     * @return \Illuminate\Http\Response
     */
     
     //コーデ投稿
     public function store(Request $request)
     {  
      
        $auths = Auth::user();
        $form = $request->all();
        
        $posts = new Post;
        $posts->user_id =$request->user_id;
        $posts->nickname=$request->nickname;
        $posts->frametype=$request->frametype;
        $posts->colortype=$request->colortype;
        $posts->body = $request->body;
        $posts->tops = $request->tops;
        $posts->inner = $request->inner;
        $posts->bottom = $request->bottom;
        $posts->shoes = $request->shoes;
        
         // formに画像があれば、保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/images');
        $posts->image_path = basename($path);
      } else {
          $posts->image_path = null;
      }
        $posts->save();
        return redirect('user');
      
    }
    
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     //ユーザーページからコーデ詳細を表示
      public function show(Request $request, $id)
    {
        //idが一致する情報を１つだけ取り出す
        $posts = Post::findOrFail($id);
        $auths = Auth::user();
        $comments = Comment::where('post_id', $id)->get();
        $goods = Good::all();
        
        return view('users.corde', [
            'posts' => $posts,
            'comments' => $comments,
            'auths' => $auths,
            'goods' => $goods,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     //プロフィール編集画面表示のみ
    public function showedit()
    {
        return view('users.edit')
             ->with('auth', Auth::user());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     
     //プロフィール編集
    public function update(Request $request)
    {
        $form = $request->all();
        $auths = Auth::user();

        unset($form['_token']);
        
     // formに画像があれば、保存する
      if (isset($form['image'])) {
        $path = $request->file('image')->store('public/images');
        $auths->image_path = basename($path);
      } else {
          $auths->image_path = null;
      }        

        $auths->fill($form)->save();

        return redirect('/user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    
 
   //コメント追加
    public function addPost(Request $request){

        $form=$request->all();
        $comments = new Comment();
        $comments->post_id = $request->post_id;
        $comments->user_id = Auth::id();
        $comments->comment = $request->comment;

       $comments->fill($form)->save();

        return back()->withInput();
    }
    

    
 
}