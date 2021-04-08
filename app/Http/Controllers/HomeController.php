<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\MakeNotification;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index', ['authId' => auth()->user()]);
    }
    public function send_notification($id)
    {
        $user = User::findOrFail($id);
        $user->notify(new MakeNotification($user->email));
        dd('Mail sending');
    }
}
