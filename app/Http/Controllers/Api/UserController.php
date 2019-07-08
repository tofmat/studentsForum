<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function profile(Request $request) {
        $user = $request->user();
        $data = $user->buildProfileData();
        return response()->json($data, 200);
    }
}