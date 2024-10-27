<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MajorRequest;
use App\Models\Major;
use Illuminate\Http\Request;

class MajorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.majors.index', [
            'title' => 'Jurusan',
            'majors' => Major::latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.majors.create', [
            'title' => 'Tambah Data Jurusan Baru'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MajorRequest $request)
    {
        $validate = $request->validated();

        Major::create($validate);

        return to_route('admin.majors.index')->with('success','Data jurusan berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Major $major)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Major $major)
    {
        return view('admin.majors.edit', [
            'title' => 'Ubah Data Jurusan',
            'major' => $major
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MajorRequest $request, Major $major)
    {
        $validate = $request->validated();

        $major->update($validate);
        return to_route('admin.majors.index')->with('success','Data jurusan berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Major $major)
    {
        $major->delete();
        return to_route('admin.majors.index')->with('success','Data jurusan berhasil dihapus');
    }
}
