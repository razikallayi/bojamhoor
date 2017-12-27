@extends('project.layout.master')
@section('content')


<div class="abt text-center">
  <h2>Page Not Found!</h2>
  <h4>please check the url!</h4>
  <a class="btn btn-lg btn-info" href="{{URL::previous()}}" >go back</a>
</div>

@endsection