<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class MyAccountController extends Controller
{
    public function __construct() {
        $this->middleware(['auth', 'verified']);
    }

    public function index() {
        return view('my-account');
    }

    public function details(Request $request) {
        $user = Auth::user();
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'. $user->id
        ]);

        if($user->email !== $request->input('email')) {
            $user->update(['email_verified_at' => null]);
        }

        $user->update([
            'name' => $request->input('name'),
            'email' => $request->input('email')
        ]);

        return response()->json(['message' => 'Account information updated!'], 200);
    }

    public function preferences(Request $request) {
        $user = Auth::user();
        $request->validate([
            'newspaper' => 'required',
        ]);

        $user->update([
            'allow_newspapers' => json_decode($request->input('newspaper')) ? 1 : 0
        ]);

        return response()->json(['message' => 'Account preferences updated!'], 200);
    }

    public function passwords(Request $request) {
        $user = Auth::user();
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => 'required|confirmed|min:8'
        ]);

        $user->update([
            'password' => Hash::make($request->input('password'))
        ]);

        return response()->json(['message' => 'Password changed!'], 200);
    }
}
