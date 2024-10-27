@extends('layouts.admin')

@section('content')
<div class="card">
  <div class="card-header">
    <h4 class="card-title">{{ __('Dashboard') }}</h4>
  </div>
  <div class="card-body">
    {{ __('You are logged in!') }}
  </div>
</div>
@endsection
