
    <h1>Xem chi tiết: {{ $material->name }}</h1>

    <ul>
        <li>ID: {{ $material->id }}</li>
        <li>Name: {{ $material->name }}</li>
        <li>Serial: {{ $material->serial }}</li>
        <li>Modal: {{ $material->modal }}</li>
        <li>IsActive: {{ $material->is_active ? 'Active' : 'InActive' }}</li>
        <li>Img: <img src="{{ \Storage::url($material->img) }}" alt="" width="50px"> </li>

    </ul>

    <a href="{{ route('materials.index') }}" class="btn btn-info">Quay lại  danh sách</a>
