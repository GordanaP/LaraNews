@php $count = 1; @endphp

@foreach ($users as $user)

    <tr>
        <!-- # -->
        <td>{{ $count++ }}</td>

        <!-- Buttons -->
        <td>
            @include('admin.users.partials._actionButtons')
        </td>

        <!-- Name -->
        <td>
            <a href="#">
                {{ $user->name }}
            </a>
        </td>

        <!-- Email -->
        <td>{{ $user->email }}</td>

        <!-- Role -->
        <td>
            @foreach ($user->roles as $role)
                {{ $role->name }}
            @endforeach
        </td>

        <!-- Update role -->
        <td>
            Update role
        </td>

        <!-- Created -->
        <td>
            {{ $user->created_at->format('d M Y') }}
        </td>
    </tr>

@endforeach
