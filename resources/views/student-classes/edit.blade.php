@extends('template.default')
@php
    $title = 'Edit Data Kelas';
    $preTitle = 'Data';
@endphp
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('student-classes.update', $class->id) }}" >
            @csrf
            @method('PUT')
                        <div class="mb-3">
                              <label class="form-label">Nama</label>
                              <input type="text" name="name" class="form-control  
                              @error('name')
                              is-invalid
                              @enderror" name="example-text-input" placeholder="Nama" value="{{ old('name') ?? $class->name }}">
                                                            @error('name')
                                  <span class="invalid-feedback">{{ $message }}</span>
                              @enderror
                            </div>
                        <div class="mb-3">
                              <label class="form-label">Slug</label>
                              <input type="text" name="slug" class="form-control  
                              @error('slug')
                              is-invalid
                              @enderror" name="example-text-input" placeholder="Slug"  value="{{ old('slug') ?? $class->slug }}">
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