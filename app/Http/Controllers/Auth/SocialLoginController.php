<?php

namespace App\Http\Controllers\Auth;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use Socialite;
use App\User;

class SocialLoginController extends Controller
{
    //

    public function githubLogin()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback()
    {
        $github_user = Socialite::driver('github')->user();
        $user = new User;
        $user->name = $github_user->name;
        $user->email = $github_user->email;

	Auth::login($user);

	if (Auth::check()) {
            return view('welcome');
	}

        return 'github login error. sometihg went wlong.';
    }

    public function twitterLogin()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function twitterCallback()
    {
        $user = Socialite::driver('twitter')->user();

	return 'twitter OK';
    }
}
