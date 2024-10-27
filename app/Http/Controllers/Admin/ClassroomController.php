<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ClassroomRequest;
use App\Models\Classroom;
use App\Models\Major;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.classroom.index', [
            'title' => 'Kelas',
            'classrooms' => Classroom::with('major')->latest()->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.classroom.create', [
            'title' => 'Tambah Data Kelas Baru',
            'majors' => Major::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomRequest $request)
    {
        $validate = $request->validated();

        Classroom::create($validate);
        return to_route('admin.classrooms.index')->with('success', 'Data kelas berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classroom $classroom)
    {
        return view('admin.classroom.edit', [
            'title' => 'Ubah Data Kelas',
            'majors' => Major::all(),
            'classroom' => $classroom
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClassroomRequest $request, Classroom $classroom)
    {
        $validate = $request->validated();
        $classroom->update($validate);
        return to_route('admin.classrooms.index')->with('success', 'Data kelas berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        $classroom->delete();
        return to_route('admin.classrooms.index')->with('success', 'Data kelas berhasil dihapus');
    }
}
