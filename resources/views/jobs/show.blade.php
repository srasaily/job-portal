@extends('layouts.master')

@section('title')
  Detail
@endsection

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Job Details</h4>
        <div class="col-lg-12">
          <div class="table-responsive">
            <table class="table table-hover" id="jobs-table">
              <tr>
                <td><strong>Title</strong></td>
                <td>{{ $job->title }}</td>
              </tr>
              <tr>
                <td><strong>Email</strong></td>
                <td>{{ $job->email }}</td>
              </tr>
              <tr>
                <td><strong>Skills</strong></td>
                <td>
                  @foreach($job->jobSkills as $skill)
                    {{ $skill->name }},
                  @endforeach
                </td>
              </tr>
              <tr>
                <td><strong>Detail</strong></td>
                <td>{{ $job->detail }}</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection