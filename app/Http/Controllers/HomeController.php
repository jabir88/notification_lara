<?php

namespace App\Http\Controllers;

use App\Notifications\SmsNotification;
use App\Notifications\TestNotification;
use App\User;
use Illuminate\Support\Facades\Auth;
use Notification;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
   public function sms()
    {
        $user = User::find(Auth::user()->id);
//        return $user;
       $user->notify(new SmsNotification($user));
       return back();
    }



    public function email()
    {
        $user = User::find(Auth::user()->id);
//      return  Notification::send(new TestNotification());
//      return  $user ;
        $user->notify(new TestNotification($user));

    }
}
