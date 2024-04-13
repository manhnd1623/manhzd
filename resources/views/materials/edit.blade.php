
    <h1>Cập nhật danh mục: {{ $material->name }}</h1>

    @if(\Session::has('msg'))
        <div class="alert alert-success">
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

    <form action="{{ route('materials.update', $material) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <label for="name">Name</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $material->name }}">
        
        <label for="name">Serial</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $material->serial }}">

        <label for="name">Modal</label>
        <input type="text" class="form-control" name="name" id="name" value="{{ $material->modal }}">

        <label for="is_active">IsActive</label>

        <input type="radio" value="{{ \App\Models\Material::ACTIVE }}"
               @if($material->is_active == \App\Models\Material::ACTIVE) checked @endif
               name="is_active" id="is_active-1">
        <label for="is_active-1">Active</label>

        <input type="radio" value="{{ \App\Models\Material::INACTIVE }}"
               @if($material->is_active == \App\Models\Material::INACTIVE) checked @endif
               name="is_active" id="is_active-2">
        <label for="is_active-2">InActive</label>

        <label for="img">Img</label>
        <input type="file" class="form-control" name="img" id="img">
        <img src="{{ \Storage::url($material->img) }}" alt="" width="50px">

        <br><br>
        <a href="{{ route('materials.index') }}" class="btn btn-info">Quay lại  danh sách</a>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
