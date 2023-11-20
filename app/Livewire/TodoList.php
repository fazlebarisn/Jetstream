<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Rule;
use App\Models\Todo;

class TodoList extends Component
{
    #[Rule('required|min:2|max:50')]
    public $name;

    public function create(){
        // Validate data
        $validated = $this->validateOnly('name');

        // Insert data
        Todo::create($validated);

        // Reset form
        $this->reset('name');

        // Success Message
        request()->session()->flash('success', 'Todo Added Successfully');

    }

    public function render()
    {
        $todos = Todo::latest()->get();
        return view('livewire.todo-list', compact('todos'));
    }
}
