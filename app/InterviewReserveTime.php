<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewReserveTime extends Model
{
    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }
    
    public function interview()
    {
        return $this->belongsTo(Interview::class);
    }
}
