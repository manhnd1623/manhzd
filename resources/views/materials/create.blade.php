
    <h1>Thêm mới danh mục</h1>

    @if(\Session::has('msg'))
        <div class="alert alert-danger">
            {{ \Session::get('msg') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('materials.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name">

        <label for="name">Serial</label>
        <input type="text" class="form-control" name="serial" id="serial">

        <label for="name">Modal</label>
        <input type="text" class="form-control" name="modal" id="modal">

        

        <label for="is_active">IsActive</label>

        <input type="radio" value="{{ \App\Models\Material::ACTIVE }}" name="is_active" id="is_active-1">
        <label for="is_active-1">Active</label>

        <input type="radio" value="{{ \App\Models\Material::INACTIVE }}" name="is_active" id="is_active-2">
        <label for="is_active-2">InActive</label>

        <label for="img">Img</label>
        <input type="file" class="form-control" name="img" id="img">

        <br><br>
        <a href="{{ route('materials.index') }}" class="btn btn-info">Quay lại  danh sách</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
