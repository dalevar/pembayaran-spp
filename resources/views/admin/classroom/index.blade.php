@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <a href="{{ route('admin.classrooms.create') }}" class="btn btn-md btn-primary">Tambah Data</a>

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
          <th>Nama Kelas</th>
          <th>Jurusan</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($classrooms as $show)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $show->name }}</td>
            <td>{{ $show->major->name }}</td>
            <td>
              <a href="{{ route('admin.classrooms.edit', $show->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
              <form action="{{ route('admin.classrooms.destroy', $show->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
              </form>
            </td>
          </tr>
        @empty
          <tr class="text-center">
            <td colspan="4">Tidak ada data kelas</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mx-3">
    {{ $classrooms->links() }}
  </div>
</div>
@endsection
