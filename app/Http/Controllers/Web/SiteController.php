<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use App\Models\Question;

class SiteController extends BaseController
{
    public function index() {
        $questions = Question::orderByDesc('id')->paginate(20);
        $recentQuestions = Question::orderBy('id')->paginate(20);
        $popularQuestions = Question::orderBy('title')->paginate(20);
        $data = [
            'questions' => $questions,
            'recentQuestions' => $recentQuestions,
            'popularQuestions' => $popularQuestions
        ];
        return view('site.index', $data);
    }
}