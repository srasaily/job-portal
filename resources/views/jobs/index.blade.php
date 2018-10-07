@extends('layouts.master')

@section('title')
  Job List
@endsection

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Jobs</h4>
        <div class="col-lg-12">
          {!! Form::open(['route' => 'jobs.index', 'method' => 'get']) !!}
          <div>
            <input class="col-lg-4" name="search" placeholder="Search...">
            <button type="submit" class="btn btn-inverse-secondary btn-rounded btn-fw">Search</button>
          </div>
          {!! Form::close() !!}
        </div>
        <hr>
        <p class="card-description">
          List of Available Jobs
        </p>
        <div class="table-responsive">
          <table class="table table-hover" id="jobs-table">
            <thead>
            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Email</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($jobs as $job)
              <tr>
                <td> {{ $loop->iteration }}</td>
                <td>{{ $job->title }}</td>
                <td>{{ $job->email }}</td>
                <td>{{ $job->created_at }}</td>
                <td><a href="{{ route('jobs.show', $job->id) }}" title="view details"><i
                        class="fa fa-eye"></i>Details</a></td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection

