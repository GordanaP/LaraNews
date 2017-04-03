<div class="flex justify-center">

    <!-- Edit -->
    <a href="{{ $user->path('edit') }}" class="btn btn-warning btn-sm btn__edit">
        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
    </a>

    <form action="{{ route('users.destroy', str_slug($user->name)) }}" method="POST">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}

            <button class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i></button>
    </form>

</div>