@extends('admin.layout.app')

@section('active_menu','mnu-project')
@section('active_submenu','manage')

@section('styles')
@parent
<!-- JQuery DataTable Css -->
<link href="{{url('assets/admin/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css')}}" rel="stylesheet">

@endsection


@section('content')

<div class="row">
	@if(!$projects->isEmpty())
	<div class="col-sm-12">
		<div class="card">
			<div class="header bg-project">
				<h2 class="">Manage Property</h2>
			</div>

			<div class="body table-wrapper">
				@if (Session::has('success'))
				<div class="alert alert-success">
					<ul>
						<li>{!!Session::get('success')!!}</li>
					</ul>
				</div>
				@endif


				<table class="table table-bordered table-responsive table-striped table-hover js-basic-example dataTable"  data-page-length="50">
					<thead>
						<tr>
							<th width="10px">Sl.No</th>
							<th width="50px">Image</th>

							<th>Title</th>
							<th>Category</th>
							<th>Project Type</th>

							<th>Price</th>
							
							<th width="10px">Edit</th>
							<th width="10px">Delete</th>
						</tr>
					</thead>
					<tbody>


						@foreach($projects as $project)



						<tr>
							<td>{{$loop->iteration}}</td>
							<td>
								<img height="50px" src="{{$project->imageUrl(null,95,50)}}">
							</td>
							
							<td>{{$project->title}}</td>
							<td>{{App\Models\Project::CATEGORIES[$project->category]['name']}}</td>
							<td>{{$project->type}}</td>
							<td>{{number_format($project->project_value,2)}}</td>

							
							<td><a href="{{url('admin/projects/edit/'.$project->id)}}"><i class="material-icons">edit</i></a></td>
							<td width="5px"><a href="{{url('admin/project/'.$project->id)}}" onclick="if(!confirm('Are you sure want to delete?')) return false;event.preventDefault();
								document.getElementById('delete-form-{{$project->id}}').submit();">
								<form id="delete-form-{{$project->id}}" action="{{ url('admin/projects/'. $project->id) }}" method="post" style="display: none;">
									{{ csrf_field() }}
									{{ method_field('DELETE') }}
								</form><i class="material-icons">delete</i></a></td>
							</tr>
							@endforeach 

						</tbody>
					</table>
				</div>
			</div>
		</div>
		@else
		<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
			<div class="card">
				<div class="body">
					No data to display.
					<a href="{{url('admin/projects/add')}}" class="btn btn-info pull-right">Add Project</a>
				</div>
			</div>
		</div>
		@endif
	</div>

	@endsection


	@section('scripts')
	@parent

	<!-- Jquery DataTable Plugin Js -->
	<script src="{{url('assets/admin/plugins/jquery-datatable/jquery.dataTables.js')}}"></script>
	<script src="{{url('assets/admin/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js')}}"></script>
	<script>
		$(function () {
			$('.js-basic-example').DataTable();
		});
	</script>

	@endsection