@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <a href="{{ route('admin.students.create') }}" class="btn btn-md btn-primary mr-4">Tambah Data</a>

    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">
      Import Data
    </button>

    <form action="{{ route('admin.students.index') }}" method="GET" class="mt-3">
      <div class="row">
        <div class="col">
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
        <div class="col">
          <div class="form-group">
            <select name="year" id="year" class="form-select" onchange="this.form.submit()">
              <option value="">Pilih Tahun Masuk</option>
              @foreach (range(date('Y'), 2000) as $year)
                <option value="{{ $year }}" {{ request('year') == $year ? 'selected' : '' }}>{{ $year }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </div>
    </form>

    @if (session()->has('success'))
    <div class="alert alert-success col-lg-10 mt-3" role="alert">
      {{ session('success') }}
    </div>
    @endif
  </div>
  <div class="table-responsive">
    <table class="table table-striped table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>NIS</th>
          <th>Nama</th>
          <th>Jurusan</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($students as $show)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $show->student_id }}</td>
            <td>{{ $show->name }}</td>
            <td>{{ $show->major->name }}</td>
            <td>
              <a href="{{ route('admin.students.show', $show->id) }}" class="btn btn-sm btn-success"><i class="bt bi-zoom-in"></i></a>
              <a href="{{ route('admin.students.edit', $show->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
              <form action="{{ route('admin.students.destroy', $show->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mx-3">
    {{ $students->links() }}
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Import Data Siswa</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.upload.excel') }}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="excel_file" class="form-label">Pilih File Excel</label>
            <input type="file" name="excel_file" id="excel_file" class="form-control">
          </div>
          <button type="submit" class="btn btn-md btn-primary">Import Data</button>
          <a href="{{ route('admin.download.excel') }}" class="btn btn-md btn-success">Download Template Excel</a>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@endsection