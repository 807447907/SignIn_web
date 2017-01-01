<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BluetoothSignIn extends Model
{
    protected $primaryKey = 'bluetooth_sign_in_id';

    protected $table = 'bluetooth_sign_in';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'bluetooth_sign_in_id', 'sign_in_id', 'bluetooth_id',
    ];
}
