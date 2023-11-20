<div>
    @if (session('success'))
        <span class="px-3 py-3 bg-green-600 text-white rounded">{{ session('success') }}</span>
    @endif
    <form class="p-5" wire:submit='createUser' action="">
        <input class="block rounded border border-gray-100 px-3 py-1 mt-1" wire:model='name' type="text" placeholder="Name">
        @error('name')
            <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror
        <input class="block rounded border border-gray-100 px-3 py-1 mt-1" wire:model='city' type="text" placeholder="City">
        @error('city')
            <span class="text-red-500 text-xs">{{$message}}</span>
        @enderror
        <button class="block rounded px-3 py-1 bg-gray-400 text-white">Create User</button>
    </form>
    <div>
        @foreach ($users as $user)
            <ul>
                <li>Name: {{ $user->name }} City: {{ $user->city }}</li>
            </ul>
        @endforeach
        {{ $users->links() }}
    </div>
</div>
