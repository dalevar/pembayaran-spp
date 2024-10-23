@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.academic_years.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="year_start" class="form-label">Tahun Mulai</label>
        <input type="number" name="year_start" id="year_start" class="form-control @error('year_start')
          is-invalid
        @enderror" value="{{ old('year_start') }}">
        @error('year_start')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="year_end" class="form-label">Tahun Berakhir</label>
        <input type="number" name="year_end" id="year_end" class="form-control @error('year_end') is-invalid @enderror" value="{{ old('year_end') }}">
        @error('year_end')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="description" class="form-label">Deskripsi (Opsional)</label>
        <input type="text" name="description" id="description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description') }}">
        @error('description')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
        @enderror
      </div>
      <div class="form-group">
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
          <option value="">Pilih Status</option>
          <option value="active">Aktif</option>
          <option value="inactive">Tidak Aktif</option>
        </select>
        @error('status')
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
