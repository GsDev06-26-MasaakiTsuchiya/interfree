<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class Interview_UserList_ReserveTime extends Model
{
    public function reserve_setting(Request $request)//面接の予約
    {
      $interview = new Interview();
      $interview->corp_id = \Auth::user()->corp_id;
      $interview->interview_type = $request->interview_type;
      $interview->interview_style = $request->interview_style;
      $interview->interviewee_id = $request->interviewee_id;
      $interview->stage_flg = 1;
      $interview->save();

      $last_insert_id = $interview->id;

      $users = $request->users;
      foreach($users as $user){
          $user_list = new UserList();
          $user_list->corp_id = \Auth::user()->corp_id;
          $user_list->interview_id = $last_insert_id;
          $user_list->user_id = $user;
          $user_list->save();
      }

      $reserve_times = $request->reserve_times;
      foreach($reserve_times as $reserve_time){
              $interview_reserve_time = new InterviewReserveTime;
              $interview_reserve_time->corp_id = \Auth::user()->corp_id;
              $interview_reserve_time->interview_id = $last_insert_id;
              $interview_reserve_time->reserve_time = $reserve_time;
              $interview_reserve_time->save();
      }

      return true;
    }
    public function interviews($corp_id,$user_id,$stage_flg)
    {
      $data =[];
      $interviews = DB::table('interviews')
                  ->join('user_lists','interviews.id', '=', 'user_lists.interview_id')
                  ->select('interviews.*')->where('interviews.corp_id','=', $corp_id)->where('user_lists.user_id', '=', $user_id)->where('interviews.stage_flg', '=', $stage_flg)->get();

      $interviews = Interview::where('corp_id', $corp_id)->where('stage_flg',1)->get();
      foreach($interviews as $interview)
      {
        $interviewee = Interviewee::where('id', $interview->interviewee_id)->first();
      }

    }
}
