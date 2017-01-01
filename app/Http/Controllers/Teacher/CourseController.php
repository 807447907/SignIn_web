<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Course;

class CourseController extends Controller
{
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:30',
            'description' => 'max:255',
        ]);

        if ($validator->fails()) {
            return [
                'errmsg' => $this->errorToString($validator->errors()),
            ];
        }
        Course::create(
            $request->only(['user_id', 'name', 'description'])
        );
        return [
            'msg' => '课程创建成功',
        ];
    }

    public function show(Request $request, $course_id = null)
    {
        if ($course_id === null) {
            return [
                'list' => Course::where($request->only('user_id'))
                    ->get()
                    ->makeHidden(['user_id', 'description', 'updated_at'])
            ];
        }
        return $this->getCourse($request, $course_id);
    }

    public function delete(Request $request, $course_id)
    {
        $course = $this->getCourse($request, $course_id);
        foreach ($course->sign_ins as $sign_in) {
            $sign_in->delete();
        }
        $course->delete();
        return [
            'msg' => '课程已删除',
        ];
    }

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

    protected function errorToString($errors)
    {
        $str = null;
        foreach ($errors->toArray() as $key => $value) {
            $str .= $key . ': ' . $value[0] . '\n';
        }
        return $str;
    }
}
