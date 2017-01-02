<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Course extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'course_id';

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'course_id', 'user_id', 'name', 'description',
    ];

    protected $hidden = ['deleted_at', 'created_at',];

    public function sign_ins()
    {
        return $this->hasMany('App\SignIn');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
