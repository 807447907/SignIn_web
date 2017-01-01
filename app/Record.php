<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $primaryKey = 'record_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'record_id', 'sign_in_id', 'user_id',
    ];

    protected $hidden = ['created_at',];

    public function sign_in()
    {
        return $this->belongsTo('App\SignIn');
    }

}
