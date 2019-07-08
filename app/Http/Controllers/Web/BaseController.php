<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Facades\View;

class BaseController extends Controller
{
    public function __construct() {
        $topCourses = Course::all();
        View::share('topCourses', $topCourses);
    }
}