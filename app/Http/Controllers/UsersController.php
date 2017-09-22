<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;
use App\Corp;
class UsersController extends Controller
{
    public function index()
    {
        if(\Auth::check()){
        $corp_id = \Auth::user()->corp_id;
        $users = User::where('corp_id', $corp_id)->get();
        // //もっとスマートにかけないか　hasmanyとか設定してるんだから
        // //ここモデルにかけるのでは？
        // $corp = Corp::where('id',$corp_id)->first();
        // // $users = $corp->users();

        return view('users.index', [
            'users' => $users,
        ]);
        }
    }

    public function create()
    {
        if(\Auth::check()){
        $user = new User;
        return view('users.create', [
            'user' => $user,
            ]);
        }

    }

    public function store(Request $request)
    {
        if(\Auth::check()){
        $user = new User;
        $corp = new Corp;
        $corp->id = \Auth::user()->corp_id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->corp_id = $corp->id;
        // if($request->department){
        $user->department = $request->department;
        // }
        // if($request->title){
        $user->title = $request->title;
        // }
        // if($request->user_profile){
        $user->user_profile = $request->user_profile;
        // }
        // if($request->user_img){
        $user->user_img = $request->user_img;
        // }
        // if($request->user_video){
        $user->user_video = $request->user_video;
        // }
        $user->kanri_flg = $request->kanri_flg;
        $user->life_flg = $request->life_flg;;
        $user->save();

        return redirect()->action('UsersController@index');
        }
    }

    public function show($id)
    {
        if(\Auth::check()){
            $user = User::find($id);
            if(\Auth::user()->corp_id == $user->corp_id){
                return view('users.show', ['user' => $user]);
            }
        }
    }
    public function edit($id)
    {
        if(\Auth::check()){

            $user = User::find($id);
            if(\Auth::user()->corp_id == $user->corp_id){
                return view('users.edit', ['user' => $user]);
            }
        }
    }

    public function update(Request $request, $id)
    {
        if(\Auth::check()){

            $user = User::find($id);
            if(\Auth::user()->corp_id == $user->corp_id){

            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->department = $request->department;
            $user->title = $request->title;
            $user->user_profile = $request->user_profile;
            $user->user_img = $request->user_img;
            $user->user_video = $request->user_video;
            $user->kanri_flg = $request->kanri_flg;
            $user->life_flg = $request->life_flg;;
            $user->save();

            return redirect()->action('UsersController@show', $user->id);
            }
        }


    }


    public function destroy()
    {

    }
}
