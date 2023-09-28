@extends('template.default')
@php
    $title = 'Tambah Data';
    $preTitle = 'Data';
@endphp
@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('students.store') }}" method="post" enctype="multipart/form-data">
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
                              <label class="form-label">Alamat</label>
                              <input type="text" name="address" class="form-control 
                              @error('address')
                              is-invalid
                              @enderror" placeholder="Alamat" value="{{ old('address') }}">
                              @error('address')
                                  <span class="invalid-feedback">{{ $message }}</span>
                              @enderror
                            </div>
                        <div class="mb-3">
                              <label class="form-label">Nomor Telepon</label>
                              <input type="text" name="phone_number" class="form-control  
                          @error('phone_number')
                              is-invalid
                              @enderror" placeholder="Nomor telepon" value="{{ old('phone_number') }}">
                              @error('phone_number')
                                  <span class="invalid-feedback">{{ $message }}</span>
                              @enderror
                            </div>
                        <div class="mb-3">
                              <label class="form-label">Kelas</label>
                              <select name="student_class_id" type="text" class="form-select tomselected " id="select-users" value="" tabindex="-1">
                              {{-- <select class=""> --}}
                                @foreach($classes as $class)
                                    <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                              </select>
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