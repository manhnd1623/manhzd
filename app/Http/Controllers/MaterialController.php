<?php

namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MaterialController extends Controller
{
    const PATH_VIEW = 'materials.';
    const PATH_UPLOAD = 'materials';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Material::query()->latest('id')->paginate(5);

        return view(self::PATH_VIEW . __FUNCTION__, compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view(self::PATH_VIEW . __FUNCTION__);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100|unique:materials',
            'serial' => 'required|max:50|unique:materials',
            'modal' => 'required|max:50|unique:materials',
            'img' => 'nullable|image|max:2048',
            'is_active' => [
                'required',
                \Illuminate\Validation\Rule::in([
                    Material::ACTIVE,
                    Material::INACTIVE
                ])
            ],
            'img' => 'nullable|image|max:2048',
        ]);

        $data = $request->except(['img']);

        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }

        Material::query()->create($data);

        return back()->with('msg', 'Thao tác thành công');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view(self::PATH_VIEW . __FUNCTION__, compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'name' => [
                'required',
                'max:100',
                \Illuminate\Validation\Rule::unique('materials')->ignore($material->id)
            ],
            'serial' => [
                'required',
                'max:50',
                \Illuminate\Validation\Rule::unique('materials')->ignore($material->id)
            ],
            'serial' => [
                'required',
                'max:50',
                \Illuminate\Validation\Rule::unique('materials')->ignore($material->id)
            ],
            'is_active' => [
                'required',
                \Illuminate\Validation\Rule::in([
                    Material::ACTIVE,
                    Material::INACTIVE
                ])
            ],
            'img' => 'nullable|image|max:2048',

        ]);

        $data = $request->except(['img']);

        if ($request->hasFile('img')) {
            $data['img'] = Storage::put(self::PATH_UPLOAD, $request->file('img'));
        }

        $oldPathImg = $material->img;

        $material->update($data);

        if ($request->hasFile('img') && Storage::exists($material->img)) {
            Storage::delete($oldPathImg);
        }

        return back()->with('msg', 'Thao tác thành công');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();

        if (Storage::exists($material->img)) {
            Storage::delete($material->img);
        }

        return back()->with('msg', 'Thao tác thành công');
    }
}