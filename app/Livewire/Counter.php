<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Sony;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class Counter extends Component
{
    use WithPagination;

    #[Rule('required|min:2|max:50')]
    public $name;

    #[Rule('required')]
    public $city;

    public function createUser(){

        $validate = $this->validate();

        // Old Way
        // $this->validate([
        //     'name'  => 'required|min:2|max:50',
        //     'city'  => 'required',
        // ]);

        Sony::create([
            'name'  => $validate['name'],
            'city'  => $validate['city'],
        ]);

        $this->reset( 'name','city' );

        request()->session()->flash('success', 'User Added Successfully');

    }

    public function render()
    {
        $users = Sony::paginate(20);
        return view( 'livewire.counter', compact('users') );
    }
}
