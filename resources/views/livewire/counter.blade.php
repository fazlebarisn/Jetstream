<div>
    <form wire:submit='createUser' action="">
        <input wire:model='name' type="text" placeholder="Name">
        <input wire:model='city' type="text" placeholder="City">
        <button>Create User</button>
    </form>
    <div>
        @foreach ($users as $user)
            <ul>
                <li>Name: {{ $user->name }} City: {{ $user->city }}</li>
            </ul>
        @endforeach
    </div>
</div>
