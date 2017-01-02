<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    protected $primaryKey = 'token_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'token_id', 'user_id', 'token',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
