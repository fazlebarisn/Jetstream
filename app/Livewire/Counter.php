<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sony;

class Counter extends Component
{
    public $name;
    public $city;

    public function createUser(){

        Sony::create([
            'name'  => $this->name,
            'city'  => $this->city,
        ]);

    }

    public function render()
    {
        $users = Sony::all();
        return view( 'livewire.counter', compact('users') );
    }
}
