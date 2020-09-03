<form action="{{ route('users.destroy', $id) }}" method="POST">
    <a href="{{ route('users.show', $id) }}">
        <button type="button" class="btn btn-primary btn-sm"><i class="far fa-eye"></i></button>
    </a>
    <a href="{{ route('users.edit', $id) }}">
      <button type="button" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></button>
    </a>
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>
</form>
