<div class="form-group">
  <label for="title">Title</label>
  {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Job Title']) !!}
  {!! $errors->first('title', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="form-group">
  <label for="email">Email address</label>
  {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
  {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="form-group">
  <label for="detail">Detail</label>
  {!! Form::text('detail', null, ['class' => 'form-control', 'placeholder' => 'Job Detail', 'row' => 5]) !!}
  {!! $errors->first('detail', '<p class="help-block text-danger">:message</p>') !!}
</div>
<hr>
<div class="form-group">
  <h4>Job Skills</h4>
  <div class="row">
    @foreach($skills as $id =>$skill)
      <div class="col-md-3">
        <div class="form-check form-check-flat">
          <label class="form-check-label">
            	{!! Form::checkbox('skills[]', $id, in_array($id, $selectedSkills),  ['class' => 'form-check-input']) !!}
            {{ $skill }}
            <i class="input-helper"></i></label>
        </div>
      </div>
    @endforeach
  </div>
</div>


<button type="submit" class="btn btn-success mr-2">Submit</button>
<a href="{{ route('jobs.index') }}" class="btn btn-light">Cancel</a>
