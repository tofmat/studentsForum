<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{
    public function create(Request $request) {
        $user = $request->user();
        if ($user == null) {
            $this->sendErrorResponse("No/invalid token", 401);
        }
        $rules = [
            'title' => 'string|required',
            'brief' => 'string',
            'course_id' => 'integer|required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            throw new \Exception();
        }
        $course = Course::find($request->input('course_id'));
        $question = new Question([
           'title' => $request->input('title'),
           'brief' => $request->input('brief'),
           'user_id' => $user->id,
           'course_id' => $request->input('course_id'),
           'school_id' => $course->school_id,
        ]);
        $question->save();
        $data = [
            'question' => $question
        ];
        $this->sendSuccessResponse($data);
    }

    public function index() {
        $questions = Question::paginate(20);
        return $this->sendSuccessResponse($questions);
    }

    public function fetchQuestionsForCourse($courseCode) {
        $course = Course::findByCode($courseCode);
        if ($course != null) {
            $questions = Question::where('course_id', $course->id)->paginate(20);
            return $this->sendSuccessResponse($questions);
        }
        return $this->sendSuccessResponse([]);
    }
}