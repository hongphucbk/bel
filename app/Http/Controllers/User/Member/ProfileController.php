<?php

namespace App\Http\Controllers\User\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\User\UserRepositoryInterface;
use App\Model\User\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\MailNotify;
use App\Mail\PasswordReset;
use App\Model\User\PassReset;
use Hash;
use Mail;

class ProfileController extends Controller
{
	public function getIndex($id)
	{
		$user = User::find($id);
		return view('v1.member.profile.index', compact('user'));

	}
    
}
