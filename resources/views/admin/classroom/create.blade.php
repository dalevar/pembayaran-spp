@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.classrooms.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name" class="form-label">Nama Kelas</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>

      <div class="form-group">
        <label for="major_id" class="form-label">Pilih Jurusan</label>
        <select name="major_id" id="major_id" class="form-control @error('major_id') is-invalid @enderror">
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

      <button type="submit" name="simpan" class="btn btn-md btn-primary">Simpan</button>
    </form>
  </div>
</div>
@endsection
