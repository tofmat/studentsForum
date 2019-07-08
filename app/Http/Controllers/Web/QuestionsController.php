<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class QuestionsController extends Controller
{
    public function new() {
        $userCourses = auth()->user()->getCourses();
        $data = [
            'userCourses' => $userCourses
        ];
        return view('questions.new', $data);
    }

    public function create(Request $request) {
        $user = auth()->user();
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
        return redirect()->route('view-question', ['id' => $question->id]);
    }

    public function view($questionId) {
        $question = Question::findOrFail($questionId);
        $data = [
            'question' => $question,
            'answers' => $question->answers
        ];
        return view('questions.view', $data);
    }

    public function addAnswer(Request $request) {
        $rules = [
            'answer' => 'string|required',
            'question_id' => 'integer|required'
        ];
        $validator = Validator::make(Input::all(), $rules);
        if (!$validator->fails()) {
            $answer = new Answer([
                'user_id' => auth()->user()->id,
                'question_id' => $request->input('question_id'),
                'answer' => $request->input('answer')
            ]);
            $answer->save();
            return redirect()->route('view-question', ['id' => $request->input('question_id')]);
        }
    }

    public function index() {
        $questions = Question::paginate(20);
        $data = [
            'questions' => $questions
        ];
        return view('questions.index', $data);
    }
}