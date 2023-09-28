<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentClass;
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
        return view('students.create', [
            'classes' => StudentClass::get(),
        ]);
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'=>['required', 'min:3'],
            'address'=>['required', 'min:5'],
            'phone_number'=>['required', 'numeric'],
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
        $student->student_class_id = $request->student_class_id;
        $student->photo = $photo;

        $student->save();
        // session()->flash('success', 'Data berhasil ditambahkan');
        return redirect()->route('students.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id) {
        $student=Student::find($id);


        return view('students.edit', [
            'student' => $student,
            'classes' => StudentClass::get(),
        ]);
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:5'],
            'phone_number' => ['required', 'numeric'],
        ]);
        $student = Student::find($id);

        $photo = $student->photo;

        if ($request->hasFile('photo')) {
            // !!!!!!!! untuk mengahapus foto yang di ubah
            // if($photo != null){
            // if(Storage::exists($photo)) {
            //     Storage::delete($photo);
            // }
            // }
            $photo = $request->file('photo')->store('photos');
        }

        $student->name = $request->name;
        $student->address = $request->address;
        $student->phone_number = $request->phone_number;
        $student->student_class_id = $request->student_class_id;
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
