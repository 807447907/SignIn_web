<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Bluetooth;
use App\BluetoothSignIn;

class SignIn extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'sign_in_id';

    protected $dates = ['deleted_at'];

    protected $appends = ['state'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sign_in_id', 'course_id', 'name', 'description',
    ];

    protected $hidden = ['deleted_at', 'created_at'];

    public function bluetooths()
    {
        return $this->belongsToMany('App\Bluetooth');
    }

    public function getStateAttribute()
    {
        return $this->bluetooths()->count() > 0;
    }

    public function start($address)
    {
        $bluetooth = Bluetooth::firstOrCreate(['address' => $address]);
        BluetoothSignIn::firstOrCreate([
            'bluetooth_id' => $bluetooth->bluetooth_id,
            'sign_in_id' => $this->sign_in_id,
        ]);
    }

    public function stop()
    {
        $bluetooth = Bluetooth::firstOrCreate(['address' => $address]);
        BluetoothSignIn::firstOrCreate([
            'bluetooth_id' => $bluetooth->bluetooth_id,
            'sign_in_id' => $this->sign_in_id,
        ]);
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function records()
    {
        return $this->hasMany('App\Record');
    }

}
