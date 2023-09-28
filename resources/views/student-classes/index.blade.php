@extends('template.default')

@php
    $title = 'Data Diswa';
    $preTitle = 'Semua Data';
@endphp
@push('page-actions')
    <a href="{{ route('student-classes.create') }}" class="btn btn-primary">Tambah Data</a>
@endpush
@section('content')
    <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Slug</th>
                          <th class="w-1"></th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($classes as $class)
                        <tr>
                          <td>
                            <a href="{{ route('student-classes.show', $class) }}">{{ $class->name }}</a>
                          </td>
                          <td>{{ $class->slug }}</td>
                          <td>
                            <a href="{{ route('student-classes.edit', $class->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('student-classes.destroy', $class->id) }}" method="POST">
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