@extends('admin.layout.app')

@section('active_menu','mnu-banner')

@section('active_submenu','add')


@section('content')
<div class="row">

	<div class="col-sm-12">
		<div class="card">
			<div class="header bg-project">
				<h2 class="">@if(isset($banner)) {{"Edit"}} @else {{"Add"}}  @endif Banner </h2>
			</div>
			<div class="body">
				@if(isset($banner))
				<form id="form_validation" method="POST" action="{{url('admin/banners/edit/'.$banner->id)}}" enctype="multipart/form-data">
					{{method_field('PUT')}}
					@else
					<form id="form_validation" method="POST" action="{{url('admin/banners')}}" enctype="multipart/form-data">
						@endif
						{{csrf_field()}}

						@if (count($errors) > 0)
						<div class="alert alert-danger">
							<ul>
								@foreach ($errors->all() as $error)
								<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
						@endif


						@if (session()->has('message'))
						<div class="alert {{session()->get('status')}}">
							<ul>
								<li>{!!session()->get('message')!!}</li>
							</ul>
						</div>
						@endif


						<div class="row clearfix">

							<div class="col-sm-6">
								<label>Title<code>*</code> </label>
								<div class="form-group ">
									<div class="form-line">
										<input type="text" value="{{$banner->title or old('title')}}" name="title" maxlength="191" required class="form-control" >
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group">
									<label>Upload Image<code>*</code></label>
									<span id ="ProgressInfo"></span>
									<p id="CropSizeInfo" class="help-block"></p>
									<input id="ImageInput" type="file" style="max-width:75px; max-height:70px; overflow:hidden;cursor:pointer;font-size: 5em;" accept="image/*" name="image" class="col-indigo glyphicon glyphicon-picture fa-5x">
									<div id="result" class="img-preview preview-lg row">
										@if(null != old('image'))
										<input type="hidden" id="image-input-{{substr( old('image'),0,-4)}}" name = "image" value="{{ old('image')}}">
										<div id="image-preview-{{substr( old('image'),0,-4)}}" class="col-lg-3 col-md-4 col-sm-6 m-t-30" style="min-height:80px"><span><img class="img-responsive" src="{{url(App\Models\Banner::IMAGE_LOCATION)."/". old('image')}}"></span></div>
										@endif
										@if(isset($banner) && $banner->image !=null )
										<div id="image-preview-{{substr($banner->image,0,-4)}}" class="col-lg-3 col-md-4 col-sm-6 m-t-30" style="min-height:80px"><span><img class="img-responsive" src="{{url(App\Models\Banner::IMAGE_LOCATION)."/".$banner->image}}"></span></div>
										@endif
									</div>
								</div>
							</div>

							<div class="col-sm-12">
								<div class="form-group">
									<div class="">
										<input type="submit" id="saveButton" name="save" value="Save" class="btn btn-lg btn-success waves-effect" >
									</div>
								</div>
							</div>

						</div>

					</form>			
				</div>
			</div>

		</div>
	</div>

	@include('admin.layout.partials.CropperModal')
	@endsection


	@section('scripts')
	@parent

	<!-- Bootstrap Select Css -->
	<link href="{{url('md/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
	<!-- Select Plugin Js -->
	<script src="{{url('md/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>



	<link href="{{url('md/plugins/cropper/cropper.min.css')}}" rel="stylesheet">
	<script src="{{url('md/plugins/cropper/cropper.min.js')}}"></script>
	<script>
		$(function() {
			whyte={};
			whyte.imageWidth = 1920;
			whyte.imageHeight = 780;
			whyte.storageLocation= "{{App\Models\Banner::IMAGE_LOCATION}}";

			whyte.postUrl = "{{url('admin/banners/image')}}";
			whyte.result = $('#result');
			whyte.image = $(".featured_image > img");
			whyte.saveButton = $("#saveButton");
			whyte.imageInput =$("#ImageInput");
			whyte.cropperModal = $('#CropperModal');
			whyte.imageSizeInfo = $('#CropSizeInfo');

			var helpinfo = 'Use images of width:<b>'+whyte.imageWidth+'px</b> and height:<b>'+whyte.imageHeight+'px</b>.';
			whyte.imageSizeInfo.html(helpinfo);

			whyte.showImage = function(data){
				whyte.output = '<div id="image-preview-'+data.no_extension_filename+'" class="col-lg-3 col-md-4 col-sm-6 m-t-30" style="min-height:80px"><span><img class="img-responsive" src="' + data.src + '"></span></div>'
    // Show
    whyte.result.html(whyte.output);

    var imageNameElement = $('<input>').attr('type','hidden')
    .attr('id','image-input-'+data.no_extension_filename)
    .attr('name','image')
    .attr('value',data.filename);
    whyte.result.append(imageNameElement);
}
});
</script>
<script src="{{url('md/js/whyte-cropper.js')}}"></script>


@endsection