@extends('layouts.master')
@section('title')
  Create
@endsection
@section('content')
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">New Job</h4>
        <p class="card-description">
          Create a Job
        </p>
        {!! Form::open(['route' => 'jobs.store', 'method' => 'POST']) !!}
        {{ csrf_field() }}
        @include('jobs.partials.form')
        {!! Form::close() !!}

      </div>
    </div>
  </div>
@endsection