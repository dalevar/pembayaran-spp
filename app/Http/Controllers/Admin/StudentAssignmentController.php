<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AcademicYear;
use App\Models\Classroom;
use App\Models\Major;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentAssignmentController extends Controller
{
    public function index(Request $request)
    {
        // Ambil data jurusan
        $majors = Major::all();

        $classrooms = Classroom::searchMajor($request->major)->get();

        // Ambil data siswa berdasarkan kelas dan request jurusan
        $students = Student::filter($request->major, $request->classroom)->with('major')->with(['classes' => function ($query) {
            $query->withPivot('academic_year_id');
        }])->paginate(10);

        return view('admin.assign.index', [
            'title' => 'Riwayat Kelas',
            'majors' => $majors,
            'classrooms' => $classrooms,
            'students' => $students
        ]);
    }

    public function create(Request $request)
    {
        $title = "Tambah Riwayat Kelas";
        $majors = Major::all();
        $students = Student::with('major')->filter($request->major_id)->status()->get();
        $classrooms = Classroom::searchMajor($request->major_id)->get();
        $academic_years = AcademicYear::where('status', '=', 'active')->get();

        return view('admin.assign.create', [
            'title' => $title,
            'majors' => $majors,
            'classrooms' => $classrooms,
            'students' => $students,
            'academic_years' => $academic_years
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_ids' => 'required|array',
            'classroom_id' => 'required|exists:classrooms,id',
            'academic_year_id' => 'required|exists:academic_years,id'
        ]);

        // Ambil data siswa yang dipilih
        $students = Student::whereIn('id', $request->student_ids)->get();

        foreach ($students as $student) {
            $student->classes()->attach($request->classroom_id, ['academic_year_id' => $request->academic_year_id, 'date' => date('Y-m-d')]);
        }

        return to_route('admin.assign.index');
    }

    public function delete(Request $request)
    {
        $student = Student::findOrFail($request->student_id);
        $student->classes()->detach($request->classroom_id);
        return to_route('admin.assign.index');
    }
}
