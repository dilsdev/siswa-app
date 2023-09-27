@extends('template.default')
@php
    $title = 'Edit Data';
    $preTitle = 'Data';
@endphp
@section('content')
<div class="card">
    <div class="card-body">
        <form method="POST" action="{{ route('students.update', $student->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                        <div class="mb-3">
                              <label class="form-label">Nama</label>
                              <input type="text" name="name" class="form-control  
                              @error('name')
                              is-invalid
                              @enderror" name="example-text-input" placeholder="Nama" value="{{ old('name') ?? $student->name }}">
                                                            @error('name')
                                  <span class="invalid-feedback">{{ $message }}</span>
                              @enderror
                            </div>
                        <div class="mb-3">
                              <label class="form-label">Alamat</label>
                              <input type="text" name="address" class="form-control  
                              @error('address')
                              is-invalid
                              @enderror" name="example-text-input" placeholder="Alamat"  value="{{ old('address') ?? $student->address }}">
                                                            @error('address')
                                  <span class="invalid-feedback">{{ $message }}</span>
                              @enderror
                            </div>
                        <div class="mb-3">
                              <label class="form-label">Nomor Telepon</label>
                              <input type="text" name="phone_number" class="form-control  
                              @error('phone_number')
                              is-invalid
                              @enderror" name="example-text-input" placeholder="Nomor telepon"  value="{{ old('phone_number') ?? $student->phone_number }}">
                                                            @error('phone_number')
                                  <span class="invalid-feedback">{{ $message }}</span>
                              @enderror
                            </div>
                        <div class="mb-3">
                              <label class="form-label">Kelas</label>
                              <input type="text" name="class" class="form-control  
                              @error('class')
                              is-invalid
                              @enderror" name="example-text-input" placeholder="Kelas"  value="{{ old('class') ?? $student->class }}">
        @error('class')
                                  <span class="invalid-feedback">{{ $message }}</span>
                              @enderror
                            </div>
                            <div class="mb-3">
                              <label class="form-label">Foto</label>
                              <input type="file" name="photo" class="form-control 
                              @error('photo')
                              is-invalid
                              @enderror"  placeholder="Foto" value="{{ old('photo') }}">
                              @error('photo')
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