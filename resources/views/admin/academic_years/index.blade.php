@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <a href="{{ route('admin.academic_years.create') }}" class="btn btn-md btn-primary">Tambah Data</a>

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
          <th>Tahun Mulai</th>
          <th>Tahun Berakhir</th>
          <th>Deskripsi</th>
          <th>Status</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($academicYears as $show)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $show->year_start }}</td>
            <td>{{ $show->year_end }}</td>
            <td>{{ $show->description }}</td>
            <td>
              @if ($show->status === "active")
                <span class="badge text-bg-success">{{ $show->status }}</span>
              @else
                <span class="badge text-bg-danger">{{ $show->status }}</span>
              @endif
            </td>
            <td>
              <a href="{{ route('admin.academic_years.edit', $show->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
              <form action="{{ route('admin.academic_years.destroy', $show->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger"><i class="bi bi-trash-fill"></i></button>
              </form>
            </td>
          </tr>
        @empty
          <tr class="text-center">
            <td colspan="6">Tidak ada data tahun ajaran</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

  <div class="mx-3">
    {{ $academicYears->links() }}
  </div>
</div>
@endsection
