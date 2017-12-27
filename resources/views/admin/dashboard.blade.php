@extends('admin.layout.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">



	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="card">
			<div class="header bg-project">
				<h2>Project</h2>
			</div>
			<div class="body">
				<div class="list-group">
					<br/>
					<a href="{{url('admin/projects/add')}}" class="list-group-item">Add Project</a>
					<a href="{{url('admin/projects')}}" class="list-group-item">Manage Project</a>
					<br/>
				</div>
			</div>
		</div>
	</div>


	<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
		<div class="card">
			<div class="header bg-project">
				<h2>Banner</h2>
			</div>
			<div class="body">
				<div class="list-group">
					<br/>
					<a href="{{url('admin/banners/add')}}" class="list-group-item">Add Banner</a>
					<a href="{{url('admin/banners')}}" class="list-group-item">Manage Banner</a>
					<br/>
				</div>
			</div>
		</div>
	</div>






</div>
@endsection