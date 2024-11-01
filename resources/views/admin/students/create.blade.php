@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.students.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="student_id" class="form-label">NIS</label>
        <input type="text" id="student_id" name="student_id" class="form-control @error('student_id') is-invalid @enderror" value="{{ old('student_id') }}">
        @error('student_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="name" class="form-label">Nama Lengkap</label>
        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="address" class="form-label">Alamat</label>
        <input type="text" id="address" name="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}">
        @error('address')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="" class="form-label d-block">Jenis Kelamin</label>
        <div class="form-check form-check-inline">
          <input type="radio" id="gender-1" name="gender" class="form-check-input" value="L">
          <label for="gender-1" class="form-check-label">Laki-Laki</label>
        </div>
        <div class="form-check form-check-inline">
          <input type="radio" id="gender-2" name="gender" class="form-check-input" value="P">
          <label for="gender-2" class="form-check-label">Perempuan</label>
        </div>
        @error('gender')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="parents" class="form-label">No HP/Whatsapp Orang Tua</label>
        <input type="text" id="parents" name="parents" class="form-control @error('parents') is-invalid @enderror" value="{{ old('parents') }}">
        @error('parents')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="major_id" class="form-label">Pilih Jurusan</label>
        <select name="major_id" id="major_id" class="form-select @error('major_id') is-invalid @enderror">
          <option value="">Pilih Jurusan</option>
          @foreach ($majors as $item)
            <option value="{{ $item->id }}">{{ $item->name }}</option>
          @endforeach
        </select>
        @error('major_id')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <button type="submit" class="btn btn-md btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection