<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;

class UserController extends BaseController
{
    public function feed() {
        $user = auth()->user();
        if ($user->getCourses() == null) {
            return redirect()->route('user.edit-profile');
        } else {
            return view('users.feed');
        }
    }
}