<?php

namespace App\Http\Controllers;

use App\Models\Sony;
use Illuminate\Http\Request;

class SonyController extends Controller
{
    public function index(){
        return view('me');
    }

    public function store(){
        Sony::create();
        return back()->with('success', 'Added');
    }

}
