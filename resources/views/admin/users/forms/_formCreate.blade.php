{{ csrf_field() }}

<!-- Name -->
<div class="form-group">
    <label for="name">Name</label>
    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') ?? $user->name }}">
</div>

<!-- Email -->
<div class="form-group">
    <label for="email">Email</label>
    <input type="text" name="email" id="email" class="form-control" value="{{ old('email') ?? $user->email }}">
</div>

<div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" class="form-control">
</div>

<!-- Role -->
<div class="form-group">
    <label for="role">Role</label>
    <select name="role[]" id="role" class="form-control" multiple>
        @foreach ($roles as $role)
            <option value="{{ $role->id }}"
                @if ((is_array(old('role')) && $ids = old('role')) || $ids = array_pluck($user->roles, 'id'))
                    @foreach ($ids as $id)
                        {{ selected($role->id, $id)}}
                    @endforeach
                @endif
            >
                {{ ucfirst($role->name) }}
            </option>
        @endforeach
    </select>
</div>

<!-- Button -->
<button type="submit" class="btn btn-info">
    {{ $button }}
</button>