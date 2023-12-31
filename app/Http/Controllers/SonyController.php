<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

use App\Models\Sony;
use Illuminate\Http\Request;

class SonyController extends Controller
{
    public function index(){
        $response = Http::get('https://notik.me/api/v2/get-offers/all?api_key=Uk8dc2qtD4zQsUWPT1q5RQjHN3KdltJs&pub_id=Vo3x9i&app_id=zCx1X1ikRl');
        $data = $response->json();
        $offers = array_slice($data['offers']['data'], 0, 5);
        // dd($data['offers']['data']);
        return view('me', compact('offers'));
        // return view('me');
    }

    public function live(){
        return view('live');
    }
    public function create(){
        return view('create');
    }

    public function store( Request $request ){
        dd($request);
        Sony::create( $request->all() );
        return response(['success' => 'Employee created successfully.']);
    }

    //Validate data brfore insert
    private function validatedData(){
        return request()->validate([
            'customer.name' => 'required',
            'customer.city' => 'required',
        ]);
    }

}
