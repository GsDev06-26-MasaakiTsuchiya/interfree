<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview_interviewee extends Model
{
 public function interview_info_get($interview_id)
 {
   $interview = Interview::find($interview_id);
   $interviewee = Interviewee::find($interview->interviewee_id);
   // $interviewee_id = $interview->interviewee_id;
   // $interviewee = Interviewee::find($interviewee_id);
   $interview_info = [
       'interview_id'         => $interview->id,
       'corp_id'              => $interview->corp_id,
       'interviewee_id'       => $interview->interviewee_id,
       'interview_type'       => $interview->interview_type,
       'stage_flg'            => $interview->stage_flg,
       'interview_style'      => $interview->interview_style,
       'interview_date_time'  => $interview->interview_date_time,
       't_r_reason'           => $interview->interview_date_time,
       'fix_time'             => $interview->fix_time,
       'deleted_at'           => $interview->deleted_at,
       'cleated_at'           => $interview->cleated_at,
       'updated_at'           => $interview->updated_at,
       'interviewee_name'         => $interviewee->name,
       'email'                    => $interviewee->email,
       'interviewee_created_at'   => $interviewee->created_at,
       'interviewee_updated_at'   => $interviewee->updated_at,
       'interviewee_corp_id'      => $interviewee->corp_id,
       'name_kana'                => $interviewee->name_kana,
       'job_post_id'              => $interviewee->job_post_id,
       'birthday'                 => $interviewee->birthday,
       'sex'                      => $interviewee->sex,
       'post_code'                => $interviewee->post_code,
       'address'                  => $interviewee->address,
       'github'                   => $interviewee->github,
       'portfolio'                => $interviewee->portfolio,
       'motivation'               => $interviewee->motivation,
       'channel'                  => $interviewee->channel,
       'interviewee_deleted_at'   => $interviewee->deleted_at,
       ];
    return $interview_info;

 }
}
