<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    /**
     * 修改书签更新时间
     * @param  [type] $uid  [description]
     * @param  [type] $time [description]
     * @return [type]       [description]
     */
    public function updateBookmarktime($uid, $time)
    {
        return self::where('id', $uid)->update(['bookmark_updatetime' => $time]);
    }
}
