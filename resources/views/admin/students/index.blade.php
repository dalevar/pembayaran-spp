@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <a href="{{ route('admin.students.create') }}" class="btn btn-md btn-primary">Tambah Data</a>
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
@endsection