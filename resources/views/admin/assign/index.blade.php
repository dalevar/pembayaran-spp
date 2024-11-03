@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <a href="{{ route('admin.assign.create') }}" class="btn btn-md btn-primary">Tambah Data</a>

    <form action="{{ route('admin.assign.index') }}" method="GET" class="mt-3">
      <div class="row">
        <div class="col-4">
          <div class="form-group">
            <select name="major" id="major_id" class="form-select" onchange="this.form.submit()">
              <option value="">Pilih Jurusan</option>
              @foreach ($majors as $item)
                <option value="{{ $item->id }}" {{ request('major') == $item->id ? 'selected' : '' }}>
                  {{ $item->name }}
                </option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="col-4">
          <div class="form-group">
            <select name="classroom" id="classrom_id" class="form-select" onchange="this.form.submit()">
              <option value="">Pilih Kelas</option>
              @foreach ($classrooms as $item)
                <option value="{{ $item->id }}" {{ request('classroom') == $item->id ? 'selected' : '' }}>{{ $item->name }}, {{ $item->major->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </form>
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <th>Nama Siswa</th>
        <th>Kelas</th>
        <th>Jurusan</th>
        <th>#</th>
      </thead>
      <tbody>
        @foreach ($students as $student)
          @foreach ($student->classes as $classroom)
            <tr>
              <td>{{ $student->name }}</td>
              <td>{{ $classroom->name }}</td>
              <td>{{ $student->major->name }}</td>
              <td>
                <form action="{{ route('admin.assign.delete') }}" method="POST">
                  @csrf
                  <input type="hidden" name="student_id" value="{{ $student->id }}">
                  <input type="hidden" name="classroom_id" value="{{ $classroom->id }}">
                  <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
                </form>
              </td>
            </tr>
          @endforeach
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mx-3">
    {{ $students->links() }}
  </div>
</div>
@endsection