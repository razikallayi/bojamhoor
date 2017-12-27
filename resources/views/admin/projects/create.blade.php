@extends('admin.layout.app')

@section('active_menu','mnu-project')
@section('active_submenu','add')

 <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        width: 100%;
        height: 300;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
      .controls {
        background-color: #fff;
        border-radius: 2px;
        border: 1px solid transparent;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
        box-sizing: border-box;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 300;
        height: 29px;
        margin-left: 17px;
        margin-top: 10px;
        outline: none;
        padding: 0 11px 0 13px;
        text-overflow: ellipsis;
        width: 400px;
      }

      .controls:focus {
        border-color: #4d90fe;
      }
      .title {
        font-weight: bold;
      }
      #infowindow-content {
        display: none;
      }
      #map #infowindow-content {
        display: inline;
      }

    </style>

@section('content')
<div class="row">
	<div class="col-sm-12">
		<div class="card">
			<div class="header bg-project">
				<h2 class="">@if(isset($project)) {{"Edit"}} @else {{"Add"}}  @endif Project </h2>
			</div>
			<div class="body">

			@if(isset($project))
				<form id="form_validation" method="POST" action="{{url('admin/projects/edit/'.$project->id)}}" enctype="multipart/form-data">
				{{method_field('PUT')}}
			@else
				<form id="form_validation" method="POST" action="{{url('admin/projects')}}" enctype="multipart/form-data">
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

				<div class="col-sm-12">
					<label>Category</label>
					<div class="m-t-20">
			@foreach(App\Models\Project::CATEGORIES as $category)
				@php
				$checkedCategory = [];
				if(isset($project) || old('category')!=null){
					$id = isset($project->category)?$project->category:old('category');
					if($category['id'] == $id){
						$checkedCategory[$category['id']] = " checked ";
					}
				}else{
					if($loop->first){
						$checkedCategory[$category['id']] = " checked ";
					}
				}
			@endphp
						<div class="col-md-4 col-sm-12">
							<input name="category" type="radio" id="radio-{{$category['id']}}" value="{{$category['id']}}" class="radio-col-blue" {{$checkedCategory[$category['id']] or ""}}>
							<label for="radio-{{$category['id']}}">{{strtoupper($category['name'])}}</label>
						</div>
						@endforeach
					</div>
				</div>

				

				<div class="col-md-12 col-sm-12">
					<label>Project Title</label>
					<div class="form-group ">
						<div class="form-line">
							<input type="text" value="{{$project->title or old('title')}}" name="title" maxlength="191" class="form-control" required="">
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-12">
					<label>Project Type</label>
					<div class="form-group ">
						<div class="form-line">
							<input type="text" value="{{$project->type or old('type')}}" name="type" maxlength="191" class="form-control" >
						</div>
					</div>
				</div>


				

				<div class="col-md-4 col-sm-12">
					<label>Price</label>
					<div class="form-group">
						<div class="form-line">
							<input type="number" step="0.001" value="{{$project->project_value or old('project_value')}}" name="project_value" maxlength="191" class="form-control">
						</div>
					</div>
				</div>

				<div class="col-md-4 col-sm-12">
					<label>Completion Date</label>
					<div class="form-group">
						<div class="form-line">
							<input type="date" value="{{isset($project->completion_date)?$project->completion_date->format('Y-m-d'): old('completion_date')}}" name="completion_date" maxlength="191" class="form-control">
						</div>
					</div>
				</div>
	

				<div class="col-md-12 col-sm-12">
					<label>Description</label>
					<div class="form-group">
						<div class="form-line">
							<textarea rows="4" name="description" class="form-control" >{{$project->description or old('description')}}</textarea>
						</div>
					</div>
				</div>



				
				<div class="col-md-12 col-sm-12">
					<label>Client</label>
					<div class="form-group">
						<div class="form-line">
							<input type="text" value="{{$project->client or old('client')}}" name="client" maxlength="191" class="form-control">
						</div>
					</div>
				</div>

				<div class="col-md-12 col-sm-12">
					<label>Client Address</label>
					<div class="form-group">
						<div class="form-line">
							<textarea rows="4" name="client_address" class="form-control" >{{$project->client_address or old('client_address')}}</textarea>
						</div>
					</div>
				</div>



				<div class="col-md-12 col-sm-12">
					<label>Map</label>

					<p class="small help-block">Enter the business name in map text box and choose from the dropdown list.</p>
					<div class="form-group">
						<div class="form-line">
							<input id="pac-input" class="controls" type="text"
							placeholder="Enter a location">
							<div id="map"></div>
							<div id="infowindow-content">
								<span id="place-name"  class="title"></span><br>
								Place ID <span id="place-id"></span><br>
								<span id="place-address"></span>
							</div>
							<input type="hidden" name="google_map_place_id"/>
						</div>
					</div>
				</div>
			<div class="col-md-6 col-sm-12">
					<label>Latitude</label>
					<div class="form-group">
						<div class="form-line">
							<input id="lat" type="number" step="0.00000000000000001" value="{{$project->latitude or old('latitude')}}" name="latitude" maxlength="191" class="form-control">
						</div>
					</div>
				</div>

				<div class="col-md-6 col-sm-12">
					<label>Longitude</label>
					<div class="form-group">
						<div class="form-line">
							<input  id="lng" type="number" step="0.00000000000000001" value="{{$project->longitude or old('longitude')}}" name="longitude" maxlength="191" class="form-control">
						</div>
					</div>
				</div>



				
				
				
{{-- 				<div class="col-md-12 col-sm-12">
					<label>Featured Project</label>
					<div class="form-group">
						<input type="checkbox" name="is_featured" value="1" id="is_featured" class="filled-in chk-col-blue" {{$project->is_featured or old('is_featured')?" checked ":""}}>
						<label for="is_featured">Featured Project</label>
					</div>
				</div> --}}

				
				<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12">
						<div class="form-group">
							<label>Upload Images<code>*</code></label>
							<span id ="ProgressInfo"></span>
							<p id="CropSizeInfo" class="small help-block">Please upload images of size 800 x 500 for best appeal</p>
							<input id="fileupload" accept="image/*" class="col-indigo glyphicon glyphicon-picture fa-5x" name="image[]" type="file" multiple="multiple" 
							style="max-width: 75px;
							max-height: 70px;
							overflow: hidden;
							cursor: pointer;
							font-size: 5em;" />
							<hr />
							<b>Preview</b><br />
							@if(isset($project))
							<p id="CropSizeInfo" class="small help-block">First image is shown as thumbnail in list views. Drag the image according to your preference</p>
							@endif
						</div>
					</div>

					<div id="result"  class="connectedSortable">
						@if(null != old('image'))
						@foreach(old('image') as $imageName)
						<input type="hidden" id="image-input-{{substr($imageName,0,-4)}}" name = "image[]" value="{{$imageName}}">
						<div id="image-preview-{{substr($imageName,0,-4)}}" class="col-lg-3 col-md-4 col-sm-6 m-t-30" style="min-height:100px"><span>
							{{-- <input name="is_thumbnail" type="radio" id="radio-{{$imageName}}" value="{{$imageName}}" class="radio-col-blue" {{old('is_thumbnail') == $imageName?" checked ":""}} ><label for="radio-{{$imageName}}">Set as Thumbnail</label> --}}
							<img class="img-responsive" src="{{url(App\Models\Property::IMAGE_LOCATION)."/".$imageName}}"></span></div>
							@endforeach
							@endif

							@if(isset($project) && null != $project->images)
							@foreach($project->images as $image)
							<div id="image-preview-{{substr($image->file_name,0,-4)}}" class="col-lg-3 col-md-4 col-sm-6 m-t-30 sort_handle" style="min-height:100px">
								<span>
									<button type="button" style="float:right;" onclick="deleteImage('{{$image->file_name}}')" class="btn btn-xs  waves-effect btn-danger pull-right"><i class="material-icons">close</i></button>

									<img class="img-responsive sortable_image" style="width:100%" src="{{$project->imageUrl($image->file_name)}}">
								</span>
							</div>
							@endforeach
							@endif
						</div>

					</div>
				</div>
				



				<div class="col-sm-12">
					<div class="form-group">
						<div class="">
							<input type="submit" id="saveButton" name="save" value="Save Data" class="btn btn-lg btn-success waves-effect" >
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


			 <script>
      // This sample uses the Place Autocomplete widget to allow the user to search
      // for and select a place. The sample then displays an info window containing
      // the place ID and other information about the place that the user has
      // selected.

      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: -33.8688, lng: 151.2195},
          zoom: 13
        });

        var input = document.getElementById('pac-input');

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        var infowindow = new google.maps.InfoWindow();
        
        @if(isset($project->google_map_place_id))
        var geocoder = new google.maps.Geocoder;
        var info = new google.maps.InfoWindow();
        geocodePlaceId(geocoder, map, info);
        @endif 

        var infowindowContent = document.getElementById('infowindow-content');
        infowindow.setContent(infowindowContent);
        var marker = new google.maps.Marker({
          map: map
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });

// var info = new google.maps.InfoWindow();
//         map.addListener('click', function(event) {
//         	$('input[name="latitude"]').val(event.latLng.lat());
//         	$('input[name="longitude"]').val(event.latLng.lng());
//           info.setContent(event.latLng.toString());
              
//         });
// info.open(map, marker);

        autocomplete.addListener('place_changed', function() {
        	
          infowindow.close();
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            return;
          }

          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(16);
          }

          // Set the position of the marker using the place ID and location.
          marker.setPlace({
            placeId: place.place_id,
            location: place.geometry.location
          });
          marker.setVisible(true);
          
          $('input[name="google_map_place_id"]').val(place.place_id);
          $('input[name="latitude"]').val(place.geometry.location.lat());
          $('input[name="longitude"]').val(place.geometry.location.lng());
          $('#lat').val(place.geometry.location.lat());
          $('#lng').val(place.geometry.location.lng());

          infowindowContent.children['place-name'].textContent = place.name;
          infowindowContent.children['place-id'].textContent = place.place_id;
          infowindowContent.children['place-address'].textContent =
              place.formatted_address;
          infowindow.open(map, marker);
        });
      }

     
 @if(isset($project->google_map_place_id)) 
      // This function is called when the user clicks the UI button requesting
      // a geocode of a place ID.
      function geocodePlaceId(geocoder, map, infowindow) {
        var placeId = '{{$project->google_map_place_id}}';
        
        geocoder.geocode({'placeId': placeId}, function(results, status) {
          if (status === 'OK') {
            if (results[0]) {
              map.setZoom(16);
              map.setCenter(results[0].geometry.location);
              var marker = new google.maps.Marker({
                map: map,
                position: results[0].geometry.location
              });
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
            } else {
              console.log('No results found');
            }
          } else {
            console.log('Geocoder failed due to: ' + status);
          }
        });
      }
       @endif 
    </script>
{{--     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAfaYYpeeJ_VkGF8vbKraZ_UcLnBuepUY8&libraries=places&callback=initMap"
        async defer></script>  --}}
         <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0Uv6tIY3_VpK0qfMi6dg9zBKe2-XonL4&libraries=places&callback=initMap"
        async defer></script>

			<!-- Bootstrap Select Css -->
			<link href="{{url('md/plugins/bootstrap-select/css/bootstrap-select.css')}}" rel="stylesheet" />
			<!-- Select Plugin Js -->
			<script src="{{url('md/plugins/bootstrap-select/js/bootstrap-select.js')}}"></script>



			<script type="text/javascript">
				window.onload = function () {
					var fileUpload = document.getElementById("fileupload");

					fileUpload.onchange = function () {
						if (typeof (FileReader) != "undefined") {
							var dvPreview = $("#result");
							dvPreview.innerHTML = "";
							var regex = /^([a-zA-Z0-9\s_\\.\-:])+(.jpg|.jpeg|.gif|.png|.bmp)$/;
							for (var i = 0; i < fileUpload.files.length; i++) {
								var file = fileUpload.files[i];

								var image = new Image();
								image.onload = function() {
									if (!file.width) {
										alert("");
									}
								};

					
					if (regex.test(file.name.toLowerCase())) {

						var reader = new FileReader();
						reader.onload = function (e) {

							var img = '<div class="col-lg-3 col-md-4 col-sm-6 m-t-30" style="min-height:100px"><span><a href="#" class="btn btn-xs  waves-effect btn-danger pull-right remove_pict"><i class="material-icons">close</i></a><img class="img-responsive" src="' +  e.target.result + '"></span></div>';


							dvPreview.append(img);
                        // dvPreview.appendChild(textbox);
                    }
                    reader.readAsDataURL(file);
                } else {
                	alert(file.name + " is not a valid image file.");
                	dvPreview.innerHTML = "";
                	return false;
                }
            }
        } else {
        	alert("This browser does not support HTML5 FileReader.");
        }
    }
};


$("#result").on( "click",".remove_pict",function(){
	$(this).parent().parent().remove();
    // $('#fileupload').val("");
});
</script>

@if(isset($project))
<!-- jquery sortable Plugin Css -->
<link href="{{url('md/plugins/jquery-sortable/jquery-sortable.min.css')}}" rel="stylesheet">
<!-- Jquery sortable Plugin Js -->
<script src="{{url('md/plugins/jquery-sortable/jquery-sortable.min.js')}}"></script>
<script type="text/javascript">
	$(".connectedSortable").sortable({
		connectWith: ".connectedSortable",
		revert: 200,
		handle: ".sortable_image",
		zIndex: 999999
	});
	$(".connectedSortable .sortable_image").css("cursor", "move");
	$(".connectedSortable").on( "sortupdate", function( event, ui,i ) {
		var order = $(this).sortable("serialize",{key:'sort[]'})+ '&itemId={{$project->id}}';;
		$.post("{{url('admin/projects/image/sort')}}", order);
	});
</script>
@endif

<script type="text/javascript">
	var deleteImage = function(filename){
		if(!confirm('Are you sure to delete the image?')){
			return;
		}
		$.ajax({
			url: "{{ url('admin/projects/image')}}",
			type: 'DELETE',
			data:{filename:filename},
			success: function(){
				$('#image-input-'+filename.slice(0,-4)).remove();
				$('#image-preview-'+filename.slice(0,-4)).remove();
			},
			error: function(){
				alert('failed');
			}
		});
	}
</script>

@endsection
