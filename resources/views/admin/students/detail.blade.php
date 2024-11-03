@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-3">
        <span class="fw-bold">NIS</span>
      </div>
      <div class="col-7">
        <span> : {{ $student->student_id }}</span>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <span class="fw-bold">Nama</span>
      </div>
      <div class="col-7">
        <span> : {{ $student->name }}</span>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <span class="fw-bold">Alamat</span>
      </div>
      <div class="col-7">
        <span> : {{ $student->address }}</span>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <span class="fw-bold">Jenis Kelamin</span>
      </div>
      <div class="col-7">
        <span> : {{ $student->gender === 'L' ? 'Laki-Laki' : 'Perempuan' }}</span>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <span class="fw-bold">No Hp/Whatsapp Ortu</span>
      </div>
      <div class="col-7">
        <span> : {{ $student->parents }}</span>
      </div>
    </div>

    <div class="row">
      <div class="col-3">
        <span class="fw-bold">Jurusan</span>
      </div>
      <div class="col-7">
        <span class="fw-bold"> : {{ $student->major->name }}</span>
      </div>
    </div>
  </div>
</div>
@endsection