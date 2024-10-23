@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.classrooms.update', $classroom->id) }}" method="POST">
      @csrf
      @method('PUT')
      <div class="form-group">
        <label for="name" class="form-label">Nama Kelas</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $classroom->name) }}">
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
            @if (old('major_id', $classroom->major_id) === $item->id)
              <option value="{{ $item->id }}" selected>{{ $item->name }}</option>
            @else
              <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endif
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
