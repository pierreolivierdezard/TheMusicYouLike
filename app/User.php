<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    function friends(){
        return $this->belongsToMany('App\User', 'friends', 'user_id', 'friend_id');
    }
    
    public function addFriend($id)
	{
		$this->friends()->attach($id);
	}
	
	public function removeFriend($id)
	{
		$this->friends()->detach($id);
	}

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profileImage', 'birthDate',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
