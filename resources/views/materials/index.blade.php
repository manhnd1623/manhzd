
    <h1>Dánh sách danh mục</h1>

    <a href="{{ route('materials.create') }}" class="btn btn-warning">Add</a>

    @if(\Session::has('msg'))
        <div class="alert alert-success">
            {{ \Session::get('msg') }}
        </div>
    @endif

    <table class="table">
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Serial</td>
            <td>Modal</td>
            <td>IsActive</td>
            <td>Img</td>
            <td>Action</td>
        </tr>

        @foreach($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->serial }}</td>
                <td>{{ $item->modal }}</td>
                <td>{{ $item->is_active ? 'Active' : 'InActive' }}</td>
                <td>
                    <img src="{{ \Storage::url($item->img) }}" alt="" width="50px">
                </td>
                <td>
                    <a href="{{ route('materials.show', $item) }}" class="btn btn-warning">Show</a>
                    <a href="{{ route('materials.edit', $item) }}" class="btn btn-info">Edit</a>

                    <form action="{{ route('materials.destroy', $item) }}" method="post">
                        @csrf
                        @method('DELETE')

                        <button type="submit"
                                class="btn btn-danger"
                                onclick="return confirm('Có chắc xóa không?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {{ $data->links() }}
