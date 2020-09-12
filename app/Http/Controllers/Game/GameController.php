<?php

namespace App\Http\Controllers\Game;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use DateTime;


class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('game')        
        ->join('gamelink', 'game.id', '=', 'gamelink.game_id')
        ->join('image', 'game.id', '=', 'image.game_id')    
        ->join('video', 'game.id', '=', 'video.game_id')  
        ->join('control', 'game.id', '=', 'control.game_id')   
        ->join('gamecategory', 'game.id', '=', 'gamecategory.game_id')
        ->join('category', 'gamecategory.category_id', '=', 'category.id')     
        ->select('game.*','gamelink.link_name', 'image.img_name', 'video.video_name', 'control.note','category_name')        
        ->get();
        return view('modules.Game.gameList',['data'=>$data]); 
    }

    public function home($id){
        $data = DB::table('game')
        ->join('gamelink', 'game.id', '=', 'gamelink.game_id')
        ->join('image', 'game.id', '=', 'image.game_id')    
        ->join('video', 'game.id', '=', 'video.game_id')  
        ->join('control', 'game.id', '=', 'control.game_id') 
        ->join('gamecategory', 'game.id', '=', 'gamecategory.game_id')
        ->join('category', 'gamecategory.category_id', '=', 'category.id') 
        ->where('game.id',$id)
        ->select('game.*','gamelink.link_name', 'image.img_name', 'video.video_name', 'control.note','category.category_name','gamecategory.category_id')->first(); 
        return view('modules.Game.gameHome',['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('category')->get();  
        return view('modules.Game.gameCreate',['data'=>$data]);
    }

    public function category(){
        return view('modules.Game.gameCreateCategory');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  
        $this->validate($request, [
            'name' => 'required|unique:game,name',
            'age' => 'required',
            'link_name' => 'required',
            
            'video_name' => 'required',
            'note' => 'required',
            'category_id' => 'required'
        ]);
        $data = $request->except('_token','link_name', 'img_name', 'video_name', 'note', 'category_id'); 
        $data['created_at'] = new DateTime;
        $data['updated_at'] = new DateTime;
        $game = DB::table('game')->insertGetId($data);  

        $data_gamecategory = $request->only('category_id');  
        $data_gamecategory["game_id"] = $game;

        $data_gamelink = $request->only('link_name');
        $data_gamelink["game_id"] = $game;

        // ========== ADD IMAGE ==========================

        $data_img = $request->only('img_name');     
        $data_img["game_id"] = $game;
        $image = $request->file('img_name');

        //lay file anh va luu file nh o trong thu muc public images
        $filename = time().'.'.$image->getClientOriginalExtension();            
        $image->move(public_path('img/'), $filename);

        $data_img['img_name'] = $filename;
        

        // ============= ADD VIDEO ======================

        $data_video = $request->only('video_name');     
        $data_video["game_id"] = $game;
       
        
        // ===================================
        $data_control = $request->only('note');
        $data_control["game_id"] = $game;

        DB::table('gamecategory')->insert($data_gamecategory);
        DB::table('gamelink')->insert($data_gamelink);
        DB::table('image')->insert($data_img);
        DB::table('video')->insert($data_video);
        DB::table('control')->insert($data_control);
        return redirect()->route('game.index');
    }
   
    public function categoryStore(Request $request){
        $data = $request->except('_token');
        DB::table('category')->insert($data);
        return view('modules.Game.gameCreateCategory');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = DB::table('game')
        ->join('gamelink', 'game.id', '=', 'gamelink.game_id')
        ->join('image', 'game.id', '=', 'image.game_id')    
        ->join('video', 'game.id', '=', 'video.game_id')  
        ->join('control', 'game.id', '=', 'control.game_id') 
        ->join('gamecategory', 'game.id', '=', 'gamecategory.game_id')
        ->join('category', 'gamecategory.category_id', '=', 'category.id') 
        ->where('game.id',$id)
        ->select('game.*','gamelink.link_name', 'image.img_name', 'video.video_name', 'control.note','category.category_name','gamecategory.category_id')->first();  
        $data1 = DB::table('category')->get();    
        return view('modules.Game.gameEdit',['data'=>$data],['data1'=>$data1]);
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
        $data = $request->except('_token');
        $data = DB::table('game')
        ->join('gamelink', 'game.id', '=', 'gamelink.game_id')
        ->join('image', 'game.id', '=', 'image.game_id')    
        ->join('video', 'game.id', '=', 'video.game_id')  
        ->join('control', 'game.id', '=', 'control.game_id') 
        ->join('gamecategory', 'game.id', '=', 'gamecategory.game_id')
        ->where('game.id',$id)
        ->update($data);
        return redirect()->route('game.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('game')->where('id',$id)->delete();
        DB::table('control')->where('game_id',$id)->delete();
        DB::table('video')->where('game_id',$id)->delete();
        DB::table('gamelink')->where('game_id',$id)->delete();
        DB::table('image')->where('game_id',$id)->delete();
        DB::table('about')->where('game_id',$id)->delete();
        DB::table('gamecategory')->where('game_id',$id)->delete();
        return redirect()->route('game.index');
    }

    public function search(Request $request){
        if($request->get('query'))
        {
            $query = $request->get('query');
            $data = DB::table('game')
            ->where('name', 'LIKE', "%{$query}%")
            ->get();
            $output = '<h1>';
            foreach($data as $row)
            {
               $output .= '
               <li><a href="data/'. $row->id .'">'.$row->name.'</a></li>
               ';
           }
           $output .= '</h1>';
           echo $output;
        }
    }

    public function searchResult(Request $request){
        $query = $request->input('search');
        $data = DB::table('game')     
        ->where('name', 'LIKE', "%{$query}%") 
        ->get();  
        return view('modules.Game.gameResult',['data'=>$data]); 
    }

    public function gamebycategory($id){
        return view('modules.Game.gameByCategory');
    }
    
    public function gamebycategorys(Request $request,$id){
        $data = DB::table('game')->get();
        $xhml = null;
        foreach($data as $d){
            $xhml .= '<h1>'.$d->name.'</h1>';
        }
        return $xhml;
    }
}
