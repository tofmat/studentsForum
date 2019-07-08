<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Question;

class SiteController extends Controller
{
    public function index() {
        $questions = Question::paginate(20);
        $data = [
            'questions' => $questions
        ];
        return view('site.index', $data);
    }
}