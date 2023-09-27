<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {
        return view('students.index', [
            'students' => Student::latest()->get(),
        ]);
    }
    public function create()
    {
        return view('students.create');
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>['required', 'min:3'],
            'address'=>['required', 'min:5'],
            'phone_number'=>['required', 'numeric'],
            'class'=>['required'],
            'photo'=>['image'],
        ]);

        
        $student = new Student();
        
        $photo = null;

        if($request -> hasFile('photo')){
            $photo = $request -> file('photo')->store('photos');
        }
        $student->name = $request->name;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->class = $request->class;
        $student->photo = $photo;

        $student->save();
        // session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('students.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id) {
        $student=Student::find($id);


        return view('students.edit', [
            'student' => $student,
        ]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:5'],
            'phone_number' => ['required', 'numeric'],
            'class' => ['required'],
        ]);
        $student = Student::find($id);

        $photo = null;

        if ($request->hasFile('photo')) {
            // !!!!!!!! untuk mengahapus foto yang di ubah
            // if(Storage::exists($student->photo)) {
            //     Storage::delete($student->photo);
            // }
            $photo = $request->file('photo')->store('photos');
        }

        $student->name = $request->name;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->class = $request->class;
        $student->photo = $photo;

        $student->save();
        // session()->flash('success', 'Data berhasil diubah');
        return redirect()->route('students.index')->with('info', 'Data berhasil diubah');
    }
    public function destroy($id) {
        $student = Student::find($id);
        
        $student->delete();
        // session()->flash('success', 'Data berhasil dihapus');
        return redirect()->route('students.index')->with('danger', 'Data berhasil dihapus');

    }
}
