<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use App\Models\Question;
use App\Models\UsersCourse;
use Illuminate\Http\Request;

class UserController extends BaseController
{
    public function feed() {
        return redirect()->route('user.edit');
        /*if ($user->getCourses() == null) {
            return redirect()->route('user.edit-profile');
        } else {
            $questions = Question::paginate(20);
            $data = [
                'questions' => $questions
            ];
            return view('users.feed', $data);
        }*/
    }

    public function profile() {
        $user = auth()->user();
        $data = [
            'user' => $user
        ];
        return view('users.profile', $data);
    }

    public function edit() {
        $user = auth()->user();
        $data = [
            'user' => $user
        ];
        return view('users.edit', $data);
    }

    public function saveCourses(Request $request) {
        $courses = $request->input('courses');
        $userId = auth()->user()->id;
        foreach ($courses as $course) {
            $instance = new UsersCourse([
                'user_id' => $userId,
                'course_id' => $course
            ]);
            $instance->save();
        }
        return redirect()->route('user.edit');
    }
}