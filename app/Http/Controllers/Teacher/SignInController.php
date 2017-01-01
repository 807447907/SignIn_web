<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Course;
use App\SignIn;
use App\User;


class SignInController extends Controller
{
    private function getCourse($request, $course_id)
    {
        if (($course = Course::where(['user_id' => $request->input('user_id'), 'course_id' => $course_id])->first()) === null
        ) {
            header('Content-type: application/json');
            echo json_encode(['errmsg' => '课程不存在']);
            exit;
        }
        return $course;
    }

    public function create(Request $request, $course_id)
    {
        $course = $this->getCourse($request, $course_id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'description' => 'max:255',
        ]);

        if ($validator->fails()) {
            return [
                'errmsg' => $this->errorToString($validator->errors()),
            ];
        }

        SignIn::create(
            ['course_id' => $course->course_id] +
            $request->only(['name', 'description'])
        );

        return [
            'msg' => '签到创建成功',
        ];
    }

    public function show(Request $request, $course_id, $sign_in_id = null)
    {
        $course = $this->getCourse($request, $course_id);

        if ($sign_in_id === null) {
            $items = [];
            foreach ($course->sign_ins->makeHidden(['user_id', 'course_id', 'description']) as $sign_in) {
                $items[] = $sign_in->toArray() + ['records' => $sign_in->records->count()];
            }
            return ['list' => $items];
        }

        if (($sign_in = $course->sign_ins->find($sign_in_id)) === null) {
            return [
                'errmsg' => '签到不存在',
            ];
        }

        $items = [];
        foreach ($sign_in->records as $record) {
            $items[] = $record->makeHidden(['sign_in_id', 'record_id'])->toArray()
                + ['name' => User::find($record->user_id)->name];
        }
        return $sign_in->makeHidden('records')->toArray() + ['records' => $items];
    }

    public function delete(Request $request, $course_id, $sign_in_id)
    {
        $course = $this->getCourse($request, $course_id);

        if (($sign_in = $course->sign_ins->find($sign_in_id)) === null) {
            return [
                'errmsg' => '签到不存在',
            ];
        }
        $sign_in->delete();
        return ['msg' => '签到已删除'];
    }

    public function start(Request $request, $course_id, $sign_in_id)
    {
        $validator = Validator::make($request->all(), [
            'address' => 'required|size:17',
        ]);
        $address = $request->input('address');

        if ($validator->fails()) {
            return [
                'errmsg' => $this->errorToString($validator->errors()),
            ];
        }
        $course = $this->getCourse($request, $course_id);
        if (($sign_in = $course->sign_ins->find($sign_in_id)) === null) {
            return [
                'errmsg' => '签到不存在',
            ];
        }
        $sign_in->start($address);
        return ['msg' => '签到已开始'];
    }

    public function stop(Request $request, $course_id, $sign_in_id)
    {
        $course = $this->getCourse($request, $course_id);
        if (($sign_in = $course->sign_ins->find($sign_in_id)) === null) {
            return [
                'errmsg' => '签到不存在',
            ];
        }
        foreach ($sign_in->bluetooths as $bluetooth) {
            $bluetooth->pivot->delete();
        }
        return ['msg' => '签到已结束'];
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
