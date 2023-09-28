@extends('template.default')
@php
    $title = 'Tambah Data Kelas';
    $preTitle = 'Data';
@endphp
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('student-classes.store') }}" method="post" enctype="multipart/form-data">
            @csrf
                        <div class="mb-3">
                              <label class="form-label">Nama</label>
                              <input type="text" name="name" class="form-control 
                              @error('name')
                              is-invalid
                              @enderror"  placeholder="Nama" value="{{ old('name') }}">
                              @error('name')
                                  <span class="invalid-feedback">{{ $message }}</span>
                              @enderror
                            </div>
                        <div class="mb-3">
                              <label class="form-label">Slug</label>
                              <input type="text" name="slug" class="form-control 
                              @error('slug')
                              is-invalid
                              @enderror" placeholder="Slug" value="{{ old('slug') }}">
                              @error('slug')
                                  <span class="invalid-feedback">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="mb3">
                                <input type="submit" value="Simpan" class="btn btn-primary">
                            </div>
        </form>

    </div>
</div>

@endsection