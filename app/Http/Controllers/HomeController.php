<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use function Sodium\compare;

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
        $messages = Message::where('seller_id', '=', auth()->user()->id)->latest()->get();
        return view('home',compact('messages'));
    }
}
