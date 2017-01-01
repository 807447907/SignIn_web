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
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'user_id', 'name', 'password', 'role_id', 'remember_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function token()
    {
        return $this->hasOne('App\Token');
    }

    public function card()
    {
        return $this->hasOne('App\Card');
    }

    public function courses()
    {
        return $this->hasMany('App\Course');
    }

    public function records()
    {
        return $this->hasMany('App\Record');
    }

}
