<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use App\Models\Question;

class SiteController extends BaseController
{
    public function index() {
        $questions = Question::paginate(20);
        $data = [
            'questions' => $questions
        ];
        return view('site.index', $data);
    }
}