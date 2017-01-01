<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Bluetooth;
use App\Record;
use App\SignIn;


class DoSignInController extends Controller
{
    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'address_list' => 'required|json',
        ]);

        if ($validator->fails()) {
            return [
                'errmsg' => $this->errorToString($validator->errors()),
            ];
        }

        $user_id = $request->input('user_id');

        $items = [];
        foreach (json_decode($request->input('address_list')) as $address) {
            foreach (Bluetooth::where(['address' => $address])->get() as $bluetooth) {
                foreach ($bluetooth->sign_ins as $sign_in) {
                    $items[$sign_in->sign_in_id] = $sign_in->makeHidden(
                        ['sign_in_id', 'course_id', 'pivot', 'state']
                    )->toArray();
                }
            }
        }
        $res = [];
        foreach ($items as $key => $value) {
            $res[] = [
                'sign_in_id' => $key,
                'name' => $value['name'],
                'description' => $value['description'],
                'updated_at' => $value['updated_at'],
                'signed' => Record::where([
                    'sign_in_id' => $key,
                    'user_id' => $user_id,
                ])->exists(),
            ];
        }
        return ['list' => $res];
    }

    public function doSignIn(Request $request, $sign_in_id)
    {
        if (($sign_in = SignIn::find($sign_in_id)) === null) {
            return [
                'errmsg' => '签到不存在',
            ];
        }

        if ($sign_in->state) {
            Record::firstOrCreate([
                'sign_in_id' => $sign_in_id,
                'user_id' => $request->input('user_id'),
            ]);
            return ['msg' => '签到成功'];
        }
        return ['msg' => '签到已过期'];
    }

    public function history(Request $request)
    {
        $items = [];
        foreach (User::find($request->input('user_id'))->records as $record) {
            $items[] = $record->sign_in->makeHidden(['sign_in_id', 'course_id', 'state', 'updated_at'])->toArray()
                + ['updated_at' => $record->updated_at->format('Y-m-d H:i:s')];
        }
        return $items;
    }

    protected function errorToString($errors)
    {
        $str = null;
        foreach ($errors->toArray() as $key => $value) {
            $str .= $key . ': ' . $value[0] . '\n';
        }
        return $str;
    }
}
