<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Trouble;
use App\Comment;
use Validator;
use Storage;



class TroubleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() //投稿一覧表示
    {   
        
        $auths=Auth::user();
        $troubles = Trouble::orderBy('created_at', 'desc')->get();
     
        
        return view('trouble.trouble',[ 'auths'=>$auths, 'troubles'=>$troubles ]);   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $auths=Auth::user();
        $troubles=Trouble::all();
        
        return view('trouble.create', [ 'auths'=>$auths,'troubles'=>$troubles ]);
    } 

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)//投稿処理
    {
        $auths= Auth::user();
        $form = $request->all();
        $troubles = new Trouble;
        $troubles->user_id = Auth::id();
        $troubles->body = $request->body;

        if (isset($form['image'])) {
            $i = 1;
            foreach($form['image'] as $image) {
              $path = $image->store('public/images');
              $troubles->setAttribute("image_path0" . $i, basename($path));
              $i++;
            } 
        } else {
            $troubles->image_path01 = $troubles->image_path02 = $troubles->image_path03 = null;
        }
        
        $troubles->save();
        
        return redirect('/trouble');
}


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)//お悩み詳細表示
    {
        //idが一致する情報を１つだけ取り出す
        $troubles = Trouble::find($id);
        $comments = Comment::where('trouble_id', $id)->get();
        $auths = Auth::user();
        
        return view('trouble.index', [
            'troubles' => $troubles,
            'comments'=>$comments,
            'auths' => $auths,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
    public function addPosts(Request $request){

        $form=$request->all();
        $comments = new Comment();
        $comments->user_id = Auth::id();
        $comments->trouble_id = $request->trouble_id;
        $comments->comment = $request->comment;
        
       $comments->fill($form)->save();

        return back()->withInput();
    }
    
}
