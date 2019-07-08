<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionsController extends Controller
{
    public function create(Request $request) {
        $user = $request->user();
        if ($user == null) {
            $this->sendErrorResponse("No/invalid token", 401);
        }
        $request->validate([
            'title' => 'string|required',
            'brief' => 'string',
            'course_id' => 'integer|required'
        ]);
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

    public function fetchQuestionsForCourse($courseCode) {
        $course = Course::findByCode($courseCode);
        if ($course != null) {
            $questions = Question::where('course_id', $course->id)->paginate(20);
            return $this->sendSuccessResponse($questions);
        }
        return $this->sendSuccessResponse([]);
    }

    public function view($questionId) {
        $question = Question::find($questionId);
        $answers = Answer::where('question_id', '=', $question->id)->get();
        $question->answers = $answers;
        if ($question != null) {
            return $this->sendSuccessResponse($question);
        }
        return $this->sendSuccessResponse(new Question());
    }

    public function addAnswer($questionId, Request $request) {
        $user = $request->user();
        $request->validate([
            'question_id' => 'integer|required',
            'body' => 'string|required',
        ]);
        $answer = new Answer([
            'user_id' => $user->id,
            'answer' => $request->input('body'),
            'question_id' => $questionId
        ]);
        $answer->save();
    }
}