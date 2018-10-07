<div class="form-group">
  <label for="title">Title</label>
  {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Job Title']) !!}
  {!! $errors->first('title', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="form-group">
  <label for="exampleInputEmail3">Email address</label>
  {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
  {!! $errors->first('email', '<p class="help-block text-danger">:message</p>') !!}
</div>

<div class="form-group">
  <label for="exampleTextarea1">Detail</label>
  {!! Form::text('detail', null, ['class' => 'form-control', 'placeholder' => 'Job Detail', 'row' => 5]) !!}
  {!! $errors->first('detail', '<p class="help-block text-danger">:message</p>') !!}
</div>

<button type="submit" class="btn btn-success mr-2">Submit</button>
<button class="btn btn-light">Cancel</button>