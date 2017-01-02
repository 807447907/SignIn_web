<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bluetooth extends Model
{
    protected $primaryKey = 'bluetooth_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bluetooth_id', 'address',
    ];

    public function sign_ins()
    {
        return $this->BelongsToMany('App\SignIn');
    }
}
