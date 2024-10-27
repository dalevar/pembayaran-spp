<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AcademicYearRequest;
use App\Models\AcademicYear;
use Illuminate\Http\Request;

class AcademicYearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.academic_years.index', [
            'title' => 'Tahun Ajaran',
            'academicYears' => AcademicYear::orderBy('status')->paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.academic_years.create', [
            'title' => 'Tambah Data Tahun Ajaran'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AcademicYearRequest $request)
    {
        $validate = $request->validated();

        AcademicYear::create($validate);
        return to_route('admin.academic_years.index')->with('success', 'Data tahun ajaran berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(AcademicYear $academicYear)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AcademicYear $academicYear)
    {
        return view('admin.academic_years.edit', [
            'title' => 'Ubah Tahun Ajaran',
            'academicYear' => $academicYear 
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AcademicYearRequest $request, AcademicYear $academicYear)
    {
        $validate = $request->validated();
        
        $academicYear->update($validate);
        return to_route('admin.academic_years.index')->with('success', 'Data tahun ajaran berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AcademicYear $academicYear)
    {
        $academicYear->delete();
        return to_route('admin.academic_years.index')->with('success','Data tahun ajaran berhasil dihapus');
    }
}
