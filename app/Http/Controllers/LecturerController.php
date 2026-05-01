<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Lecturer;
use Illuminate\Http\Request;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lecturers = Lecturer::with('department')->get();

    return view('lecturer.index', [
        'title' => 'Data Lecturer',
        'lecturers' => $lecturers
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lecturer.create', [
        'title' => 'Create Lecturer',
        'departments' => Department::latest()->get(),
    ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'department_id' => 'required|exists:departments,id',
            ], [
                'name.required' => 'Nama Wajib Di isi',
                'name.max' => 'Nama tidak boleh lebih dari :max karakter',
                'department_id.required' => 'Program Studi Wajib Di isi',
                'department_id.exists' => 'Program studi tidak ditemukan',
            ]);

        Lecturer::create($validated);

    return to_route('lecturer.index')->withSuccess('Data Berhasil Di Tambahkan');


    }

    /**
     * Display the specified resource.
     */
    public function show(Lecturer $lecturer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lecturer $lecturer)
    {
        return view('lecturer.edit', [
        'title' => 'Edit Lecturer',
        'departments' => Department::latest()->get(),
        'lecturer' => $lecturer,
    ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lecturer $lecturer)
    {
        $validated = $request->validate([
        'name' => 'required|max:255',
        'department_id' => 'required|exists:departments,id',
            ], [
                'name.required' => 'Nama Wajib Di isi',
                'name.max' => 'Nama tidak boleh lebih dari :max karakter',
                'department_id.required' => 'Program Studi Wajib Di isi',
                'department_id.exists' => 'Program studi tidak ditemukan',
            ]);

        $lecturer->update($validated);

    return to_route('lecturer.index')->withSuccess('Data Berhasil Di Ubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete($lecturer);
    return to_route('student.index')->withSuccess('Data Berhasil Di hapus');
    }
}
