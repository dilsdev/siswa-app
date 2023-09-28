<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('student-classes.index', [
            'classes' => StudentClass::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('student-classes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $class = new StudentClass();

        $class->name = $request->name;
        $class->slug = $request->slug;

        $class->save();
        session()->flash('success', 'Data berhasil di tambah');
        return redirect()->route('student-classes.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('student-classes.show', [
            'class' => StudentClass::find($id), 
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $class = StudentClass::find($id);

        return view(
            'student-classes.edit',
            compact('class'),
            [
                'name' => $class,
            ]
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $class = StudentClass::find($id);
        $class->name = $request->name;
        $class->slug = $request->slug;

        $class->save();
        session()->flash('info', 'Data kelas diperbarui');
        return redirect()->route('student-classes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $class = StudentClass::find($id);

        $class->delete();
        session()->flash('danger', 'Data kelas dihapus');
        return redirect()->route('student-classes.index');
    }
}
