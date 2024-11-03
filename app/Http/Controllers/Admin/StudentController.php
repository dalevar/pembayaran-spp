<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Students\StoreStudentRequest;
use App\Http\Requests\Students\UpdateStudentRequest;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Siswa';
        $majors = Major::all();
        $students = Student::with('major')->filter($request->major)->status()->paginate(10);
        return view('admin.students.index', [
            'title' => $title,
            'majors' => $majors,
            'students' => $students
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.students.create', [
            'title' => 'Tambah Data Siswa',
            'majors' => Major::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $validate = $request->validated();
        $validate['year'] = date('Y');
        Student::create($validate);

        return to_route('admin.students.index')->with('success', 'Data siswa berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        return view('admin.students.detail', [
            'title' => 'Detail Siswa ' . $student->name,
            'student' => $student
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        return view('admin.students.edit', [
            'title' => 'Ubah Data Siswa',
            'majors' => Major::all(),
            'student' => $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $validate = $request->validated();

        $student->update($validate);
        return to_route('admin.students.index')->with('success', 'Data siswa berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return to_route('admin.students.index')->with('success', 'Data siswa berhasil dihapus');
    }
}
