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
}