<?php
namespace App\Http\Controllers\Web;

use App\Http\Controllers\Web\BaseController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\MessageBag;

class AuthController extends BaseController
{
    public function login() {
        return view('auth.login');
    }

    public function doLogin(Request $request) {
        $data = $request->only(['reg_no', 'password']);
        if ($attempt = Auth::attempt($data)) {
            return redirect()->route('feed');
        } else {
            $errors = new MessageBag(['message' => ['Incorrect username and/or password']]);
            return redirect()->route('login')
                ->withErrors($errors);
        }
    }
}