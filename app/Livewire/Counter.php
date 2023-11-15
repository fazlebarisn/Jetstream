<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $count = 1;
    public $me = 1;
 
    public function increment()
    {
        $this->count++;
    }
 
    public function decrement()
    {
        $this->count--;
    }

    public function rw(){
        return 44;
    }
 
    public function render()
    {
        return view('livewire.counter');
    }
}
