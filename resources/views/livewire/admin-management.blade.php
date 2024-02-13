<div>
    <h1>Admin Management</h1>
    <div class="max-w-xl">
        @livewire('profile.create-admin')
       </div>

    <h2>Super Admins</h2>

    <ul>
        @foreach ($superAdmins as $superAdmin)
            <li>{{ $superAdmin->name }}</li>
        @endforeach
    </ul>

    <h2>Admins</h2>
    <ul>
        @foreach ($admins as $admin)
            <li>{{ $admin->name }}
                @if (auth()->user()->role === 'super_admin' && $admin->role === 'admin')
                    <button wire:click="deleteAdmin({{ $admin->id }})">Delete</button>
                @endif
            </li>
        @endforeach
    </ul>

</div>
