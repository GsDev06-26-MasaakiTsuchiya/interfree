<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Interview extends Model
{
    //softdelete
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'corp_id', 'interview_type', 'interview_style', 'interviewee_id', 'interview_date_time', 'stage_flg', 't_r_reason', 'fix_time',
    ];
    
    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }
    
    
    public function interviewee()
    {
        return $this->belongsTo(Interviewee::class);
    }
    
    public function user_lists()
    {
        return $this->hasMany(UserList::class);
    }
    
    public function interview_reserve_times()
    {
        return $this->hasMany(InterviewReserveTime::class);
    }
}
