@extends('layouts.master')
@section('title')
  Edit
@endsection
@section('content')
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Edit Job</h4>
        <p class="card-description">
          Edit a Job
        </p>

        {!! Form::model($job, ['route' => ['jobs.update', $job->id],'method' => 'patch']) !!}
        @include('jobs.partials.form')
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection