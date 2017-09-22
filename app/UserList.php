<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserList extends Model
{
    
    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function interview()
    {
        return $this->belongsTo(Interview::class);
    }
}
