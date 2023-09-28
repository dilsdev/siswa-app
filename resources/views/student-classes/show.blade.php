@extends('template.default')

@php
    $title = 'Data Siswa Kelas ' . $class->name;
    $preTitle = 'Semua Data';
@endphp
@section('content')
    <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Address</th>
                          <th>Phone number</th>
                          <th>Class</th>
                          <th>Foto</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($class->students as $student)
                        <tr>
                          <td>{{ $student->name }}</td>
                          <td>{{ $student->address }}</td>
                          <td>{{ $student->phone_number }}</td>
                          <td>{{ $class->name }}</td>
                          <td>
                              <img src="{{ asset('storage/'. $student->photo) }}" height="150" alt="">
                          </td>
                          <td>
                            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                          </form>
                          </td>
                        </tr>
                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
@endsection