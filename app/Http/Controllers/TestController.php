<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Bluetooth;
use App\SignIn;

class TestController extends Controller
{
    public function test()
    {
        return 'ok';
    }
}
