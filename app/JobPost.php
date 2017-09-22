<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    protected $fillable = [
        'corp_id', 'job_title',
    ];
    
    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }
}
