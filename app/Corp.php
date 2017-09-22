<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Corp extends Model
{
    
    protected $fillable = ['corp_name', 'address', 'tel', 'corp_url', 'corp_mail', 'profile_flg', 'info_text_flg', 'info_photo_flg', 'info_pdf_flg', 'info_video_flg'];
       

    public function users()
    {
        return $this->hasMany(User::class);
    }
    
    public function interviewees()
    {
        return $this->hasMany(Interviewee::class);
    } 
    
    public function job_posts()
    {
        return $this->hasMany(JopPost::class);
    } 
    public function interviews()
    {
        return $this->hasMany(Interview::class);
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
