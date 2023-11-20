<?php

namespace App\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class TodoList extends Component
{
    use WithPagination;

    #[Rule('required|min:2|max:50')]
    public $name;

    public $search;

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
        $todos = Todo::latest()
            ->where('name','like',"%{$this->search}%")
            ->paginate(5);
        return view('livewire.todo-list', compact('todos'));
    }
}
