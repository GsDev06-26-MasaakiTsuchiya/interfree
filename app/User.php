<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'corp_id', 'department', 'title', 'user_profile', 'user_img', 'user_video', 'kanri_flg', 'life_flg',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //softdelete
    protected $dates = ['deleted_at'];

    public function corp()
    {
        return $this->belongsTo(Corp::class);
    }
    public function interviews()
    {
        $interviews = DB::table('interviews')
                    ->join('user_lists','interviews.id', '=', 'user_lists.interview_id')
                    ->select('interviews.*')->where('user_lists.user_id', '=', $this->id)->get();
    }

    public function user_lists()
    {
        return $this->hasMany(UserList::class);
    }

    public function users_name($users_id_list)
    {
      $users_name_list=[];
    //   if(is_array($users_id_list)){
          foreach((array)$users_id_list as $id){
              $user = User::find($id);
              array_push($users_name_list, $user->name);
          }
    //   }else{
    //         $user = User::find($users_id_list[0]);
    //         array_push($users_name_list, $user->name);
    //     }
      return $users_name_list;

    }


}
