<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\AdStore;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdController extends Controller
{
    use RegistersUsers;

    public function index()
    {
        $ads = Ad::latest()->paginate(2);
        return view('ads',compact('ads'));
    }
    public function create()
    {
        return view('create');
    }

    public function store(AdStore $request)
    {
        $validated = $request->validated();
        if(!Auth::check()){
            $request->validate([
                'name' => 'required|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required'
            ]);
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                'password' => Hash::make($request['password']),
            ]);
            $this->guard()->login($user);
        }

        $ad = new Ad();
        $ad->title = $validated['title'];
        $ad->description = $validated['description'];
        $ad->location = $validated['location'];
        $ad->price = $validated['price'];
        $ad->user_id = auth()->user()->id;
        $ad->save();
        return redirect()->route('welcome')->with('success', 'Advertise has been created');
    }

    public function search(Request $request)
    {
        $words = $request->words;
        $ads = Ad::where('title','LIKE', "%$words%")
            ->orWhere('description', 'LIKE', "%$words%")
            ->latest()->get();
        return response()->json(['success' => true, 'ads' => $ads]);
    }

    public function show($id)
    {
        $ad = Ad::find($id);
        return view('show',compact('ad'));
    }
}
