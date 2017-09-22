<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Corp;
use App\User;
use App\Libs\BaseClass;

class CorpsController extends Controller
{
//   public function index()
//     {
        
//     }
    
    public function create()
    {
        $corp = new Corp;
        return view('corps.create', [
            'corp' => $corp,
            ]);
    }
    
    public function store(Request $request)
    {
            // $this->validate($request, [
            // 'title' => 'required|max:255',
            // 'content' => 'required|max:255',
            
            // ]);
            
        $corp = new Corp;
        $corp->corp_name        = $request->corp_name;  
        $corp->address          = $request->address;
        $corp->tel              = $request->tel;
        $corp->corp_url         = $request->corp_url;
        $corp->corp_mail        = $request->corp_mail;
        $corp->profile_flg      = 1;
        $corp->info_text_flg    = 1;
        $corp->info_photo_flg   = 1;
        $corp->info_pdf_flg     = 1;
        $corp->info_video_flg   = 1;
        $corp->save();
 
        $last_insert_id = $corp->id;//corpのIDを取得
        
        
        $base = new BaseClass;
        $password = $base->makeRandStr(8);
        
        
        $password = "1111111";
        $user = new User;

        $user->name = "administrator";
        $user->email = $request->corp_mail;
        $user->password = bcrypt($password);
        $user->corp_id = $last_insert_id;
        $user->kanri_flg = 2;
        $user->life_flg = 1;
        $user->save();
        
        return redirect('/');
        
        // function makeRandStr($length)
        // {
        // $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
        // $r_str = null;
        // for ($i = 0; $i < $length; $i++) {
        //     $r_str .= $str[rand(0, count($str) - 1)];
        // }
        // return $r_str;
        // }
    }
    
    
    public function show($id)
    {
        $data = [];
        
        if (\Auth::user()->corp_id == $id) {
        $corp = Corp::find($id);
        $user = User::where('name', 'administrator')->where('corp_id', \Auth::user()->corp_id)->first();
        $data = [
            'corp' => $corp,
            'user' => $user,
            ];
        }
        return view('corps.show', $data);
    }
    public function edit($id)
    {
        $data = [];
        
        if (\Auth::user()->corp_id == $id) {
        $corp = Corp::find($id);
        $user = User::where('name', 'administrator')->where('corp_id', \Auth::user()->corp_id)->first();
        $data = [
            'corp' => $corp,
            'user' => $user,
            ];
        }
        return view('corps.edit', $data);
        
    }
    
    public function update(Request $request, $id)
    {
        
        if (\Auth::user()->corp_id == $id) {
        $corp = Corp::find($id);
     
        $corp->corp_name        = $request->corp_name;  
        $corp->address          = $request->address;
        $corp->tel              = $request->tel;
        $corp->corp_url         = $request->corp_url;
        $corp->corp_mail        = $request->corp_mail;
        $corp->profile_flg      = $request->profile_flg;
        $corp->info_text_flg    = $request->info_text_flg;
        $corp->info_photo_flg   = $request->info_photo_flg;
        $corp->info_pdf_flg     = $request->info_pdf_flg;
        $corp->info_video_flg   = $request->info_video_flg;
        $corp->save();
        
        // return redirect()->route('corps', [$corp]);
        return redirect()->action('CorpsController@show', $corp->id);
        }
    }

    
    public function destroy()
    {
        
    }

}
