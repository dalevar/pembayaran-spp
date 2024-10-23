@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.majors.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name" class="form-label">Nama Jurusan</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
        @error('name')
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
