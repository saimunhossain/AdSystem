<?php

namespace App\Http\Controllers;

use App\Ad;
use App\Http\Requests\AdStore;
use Illuminate\Http\Request;

class AdController extends Controller
{
    public function create()
    {
        return view('create');
    }

    public function store(AdStore $request)
    {
        $validated = $request->validated();

        $ad = new Ad();
        $ad->title = $validated['title'];
        $ad->description = $validated['description'];
        $ad->location = $validated['location'];
        $ad->price = $validated['price'];
        $ad->save();
        return redirect()->route('welcome')->with('success', 'Advertise has been created');
    }
}
