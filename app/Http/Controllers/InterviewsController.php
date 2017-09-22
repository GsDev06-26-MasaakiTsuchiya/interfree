<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Interviewee;
use App\Interview;
use App\User;
use App\InterviewReserveTime;
use App\UserList;
Use App\Interview_UserList_ReserveTime;

class InterviewsController extends Controller
{
    //
    public function index()
    {

        return view('interviews.index');
    }


    public function style_select($id,$interview_type){
        if(\Auth::check()){
        $interviewee = Interviewee::find($id);
        session(['interviewee_id' => $id, 'interview_type' => $interview_type]);
        return view('interviews.setting.style_select', [
            'interviewee' => $interviewee,
            'interview_type' => $interview_type,
        ]);
        }
    }
    public function user_select($intervivew_style){
        if(\Auth::check()){
        session(['interview_style' => $intervivew_style]);
        $users = User::where('corp_id',\Auth::user()->corp_id)->where('life_flg',1)->get();
        return view('interviews.setting.user_select',[
            'users' => $users,
            ]);
        }
    }


    public function interview_time_select(Request $request){
        if(\Auth::check()){
        session(['users_list' => $request->users]);
            return view('interviews.setting.interview_time_select',[
                'users_list' => $request->users,
                ]);
        }

    }
    public function interview_setting_confirm(Request $request){
        $interviewee_id  = $request->session()->get('interviewee_id');
        $interview_type  = $request->session()->get('interview_type');
        $interview_style = $request->session()->get('interview_style');
        $users_list      = $request->session()->get('users_list');

        $users = new User;
        $users_name_list = $users->users_name($users_list);
        if(\Auth::check()){
        session(['reserve_times' => $request->reserve_times]);
        return view('interviews.setting.interview_setting_confirm',[
                'reserve_times'                => $request->reserve_times,
                'interviewee_id'               => $interviewee_id,
                'interview_type'               => $interview_type,
                'interview_style'              => $interview_style,
                'users_list'                   => $users_list,
                'users_name_list'              => $users_name_list,
                ]);
        }
    }
    public function interview_setting_store(Request $request)
    {
        if(\Auth::check()){
            $interview_userlist_reservetime = new Interview_UserList_ReserveTime;
            $interview_userlist_reservetime->reserve_setting($request);
            return redirect('/interviews/');//レリダイレクトの書きか書き方
        }
    }
}
