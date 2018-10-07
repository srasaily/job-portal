<h1>Hello!</h1>
<p>Someone has created a new Job at Job Portal using your email. If it was you, please verify it by
  clicking the button below:
  <br>
  <a href="{{ route('jobs.verify', $token) }}" target="_blank" class="btn btn-inverse-success btn-rounded btn-fw">Verify</a>
</p>
