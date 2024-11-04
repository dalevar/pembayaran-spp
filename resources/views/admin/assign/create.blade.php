@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <form action="{{ route('admin.assign.create') }}" method="GET">
      <div class="row">
        <div class="col">
          <div class="form-group">
            <select name="major_id" id="major_id" class="form-select" onchange="this.form.submit()">
              <option value="">Pilih Jurusan</option>
              @foreach ($majors as $item)
                <option value="{{ $item->id }}" {{ request('major_id') == $item->id ? 'selected' : '' }}>
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

    <form action="{{ route('admin.assign.store') }}" method="POST">
      @csrf
      <div class="table-responsive mt-3">
        <table class="table table-striped table-hover">
          <thead>
            <tr>
              <th width="170px">
                <input type="checkbox" class="form-check-input" id="select-all"> Pilih Semua
              </th>
              <th>NIS</th>
              <th>Nama Siswa</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($students as $show)
              <tr>
                <td>
                  <input type="checkbox" class="form-check-input" name="student_ids[]" value="{{ $show->id }}">
                </td>
                <td>{{ $show->student_id }}</td>
                <td>{{ $show->name }}</td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <div class="form-group">
        <label class="form-lable" for="classroom_id">Pilih Kelas</label>
        <select name="classroom_id" id="classroom_id" class="form-select">
          <option value="">Pilih Kelas</option>
          @foreach ($classrooms as $show)
            <option value="{{ $show->id }}">{{ $show->name }}, {{ $show->major->name }}</option>
          @endforeach
        </select>
      </div>

      <div class="form-group">
        <label class="form-lable" for="academic_year_id">Tahun Ajar</label>
        <select name="academic_year_id" id="academic_year_id" class="form-select">
          @foreach ($academic_years as $show)
            <option value="{{ $show->id }}">{{ $show->description }}</option>
          @endforeach
        </select>
      </div>

      <button type="submit" class="btn btn-md btn-primary">Simpan</button>
    </form>
  </div>
</div>
<script>
  document.getElementById('select-all').addEventListener('click', function() {
    const checkboxes = document.querySelectorAll('input[name="student_ids[]"]');
    for (var checkbox of checkboxes) {
      checkbox.checked = this.checked;
    }
  });
</script>
@endsection