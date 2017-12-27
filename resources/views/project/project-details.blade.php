@extends('project.layout.master')
@section('page_id','#projects')
@section('content')

<div class="tp-space"></div>    
 
 
 <div class="pro-slider">
   <div class="container">
      <div class="col-md-12 no-padding">
         <div class="pro-head clearfix">
          <div class="col-md-9 no-padding">
             <h2>{{$project->title}}  <br> <span>{{$project->type}}</span></h2>
          </div>
          <div class="col-md-3 no-padding">
             <h4><i class="fa fa-check"></i> <span>Project Status</span> <br> {{$project->getProjectStatus()}}</h4>
          </div>
        </div>
		<div class="slider-container"> 
   <div id="slider" class="slider owl-carousel"> 
    @foreach($project->images as $image)
      <div class="item"><img src="{{$project->imageUrl($image->file_name)}}" class="img-responsive"></div> 
    @endforeach
   </div> 
    
</div>

<div class="thumbnail-slider-container"> 
   <div id="thumbnailSlider" class="thumbnail-slider owl-carousel"> 
          @foreach($project->images as $image)
      <div class="item"><img src="{{$project->imageUrl($image->file_name)}}" class="img-responsive"></div> 
    @endforeach
   </div> 
</div>
 
      </div>
   </div>
 </div>
 

<div class="pro-det">
  <div class="container">
     <div class="col-md-12 no-padding">
        
        
        <div class="pro-sec">
          <div class="row">
             <div class="col-md-6">
                <ul>
                   <li class="clearfix"><span>Client :</span><span>{{$project->client}} </span></li>
                   <li class="clearfix"><span>Project Value  : </span><span>  {{number_format($project->project_value,2)}} </span></li>
                   <li class="clearfix"><span>Completion Date : </span><span>{{isset($project->completion_date)?$project->completion_date->format('d M Y'):''}}</span></li>
                </ul>
             </div>
             <div class="col-md-6">
             <h4>Project Discription</h4>
               <p>{{$project->description}} </p>
             </div>
          </div>
        </div>

        @if(isset($project->latitude) && isset($project->longitude))
        <div class="pro-map">
           <div style="height:400px" id="map"></div>
        </div>
        @endif

        <div class="op">
          <h2>Our Projects</h2>
          <div class="row">
            @foreach($relatedProjects as $relatedProject)
            <div class="col-md-4">
              <div class="proj aos-item" data-aos="fade-down"><a href="{{$relatedProject->detailPageUrl()}}">
                  <div class="proj-img"><img src="{{$relatedProject->imageUrl()}}" class="img-responsive"><div class="st">{{$relatedProject->getProjectStatus()}}</div></div>
                  <h4>{{$relatedProject->title}}</h4>
                  </a>
               </div>
            </div>
            @endforeach
                      {{-- 
            <div class="col-md-4">
              <div class="proj aos-item" data-aos="fade-up"><a href="al-wajba.html">
                  <div class="proj-img"><img src="{{url('project/images/projects/aw1.jpg')}}" class="img-responsive"><div class="st">Completed</div></div>
                  <h4> Al Wajba Guards Residence</h4>
                  </a>
               </div>
            </div>
            
            <div class="col-md-4">
              <div class="proj aos-item" data-aos="fade-up"><a href="abm.html">
                  <div class="proj-img"><img src="{{url('project/images/projects/abm2.jpg')}}" class="img-responsive"><div class="st">Completed</div></div>
                  <h4>Development of ABM Military College Package No.1</h4>
                  </a>
               </div>
            </div> --}}
            
          </div>
        </div>
        
     </div>
  </div>
</div>
 
 
 
@endsection
@section('scripts')
<script src="{{url('project/js/header.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{url('project/js/aos.js')}}"></script>
<script src="{{url('project/js/owl.carousel.js')}}"></script>
<script>
$(document).ready(function () {
  var slider = $('#slider');
  var thumbnailSlider = $('#thumbnailSlider');
  var duration = 500;
  slider.owlCarousel({
   loop:false,
   nav:false,
   autoplay:true,
   items:1
  }).on('changed.owl.carousel', function (e) {
   thumbnailSlider.trigger('to.owl.carousel', [e.item.index, duration, true]);
  });
  thumbnailSlider.owlCarousel({
   loop:false,
   center:false, 
   nav:false,
   margin:20,
   responsive:{
    0:{
     items:3
    },
    600:{
     items:3
    },
    1000:{
     items:3
    }
   }
  }).on('click', '.owl-item', function () {
   slider.trigger('to.owl.carousel', [$(this).index(), duration, true]);
  }).on('changed.owl.carousel', function (e) {
   slider.trigger('to.owl.carousel', [e.item.index, duration, true]);
  });
 });
 </script>

<script>
	$(window).on("scroll", function() {
    $(".navbar").toggleClass("shrink", $(this).scrollTop() > 10)
});
	
	 $(document).ready(function(){
  var navbar = $(".navbar-header");
  $(window).scroll(function() {
    if ($(document).scrollTop() > 10) { 
      navbar.find(".menu__biglogo").removeClass('active');
      navbar.find(".menu__minilogo").addClass('active');

    } else {
      navbar.find(".menu__biglogo").addClass('active');
      navbar.find(".menu__minilogo").removeClass('active');

    }
  });
});

</script>

@if(isset($project->latitude) && isset($project->longitude))
   <script>
      function initMap() {
        var place = {lat: {{$project->latitude}}, lng: {{$project->longitude}}};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: place
        });
        var marker = new google.maps.Marker({
          position: place,
          map: map
        });

         var contentString = '<div id="content">'+
            '<h4 id="firstHeading" class="firstHeading">'+'{{$project->title}}'+'</h4>'+
            '</div>';

        var infowindow = new google.maps.InfoWindow({
          content: contentString
        });
        marker.addListener('click', function() {
          infowindow.open(map, marker);
        });
      }
    </script>
      <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA0Uv6tIY3_VpK0qfMi6dg9zBKe2-XonL4&callback=initMap">
    </script>
@endif

@endsection