@extends('project.layout.master')
@section('page_id','#home')
@section('content')


<div class="mainslider">
<div class="tp-banner-container">
		<div class="tp-banner" >
			<ul>	
        @foreach($banners as $banner)
            <li data-transition="parallaxtoleft" data-slotamount="7" data-masterspeed="1500" >
					<img src="{{$banner->imageUrl()}}"  alt=""  data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">

					<div class="tp-caption lfb skewtoleft sliderbox"
						data-x="right" data-hoffset="0"
						data-y="bottom" data-voffset="-100"
						data-speed="1000"
						data-start="500"
						data-easing="Power4.easeOut"
						data-endspeed="400"
						data-endeasing="Power1.easeIn"
						style="z-index: 11"><h2>{{$banner->title}}</h2>
					</div>
				
				</li>
        @endforeach
                
				{{-- <li data-transition="parallaxtoleft" data-slotamount="7" data-masterspeed="1500" >
					<img src="{{url('project/images/slider/slider1.jpg')}}"  alt=""  data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">

					<div class="tp-caption lfb skewtoleft sliderbox"
						data-x="right" data-hoffset="0"
						data-y="bottom" data-voffset="-200"
						data-speed="1000"
						data-start="500"
						data-easing="Power4.easeOut"
						data-endspeed="400"
						data-endeasing="Power1.easeIn"
						style="z-index: 11"><h2>We believe in being Resourceful, Cost-conscious, Innovative, On-
time and on-budget by maximizing project efficiency across all
business units</h2>
					</div>

				
				</li>
                
                <li data-transition="parallaxtoleft" data-slotamount="7" data-masterspeed="1500" >
					<img src="{{url('project/images/slider/2.jpg')}}"  alt=""  data-bgfit="cover" data-bgposition="center top" data-bgrepeat="no-repeat">

					<div class="tp-caption lfb skewtoleft sliderbox"
						data-x="right" data-hoffset="0"
						data-y="bottom" data-voffset="-100"
						data-speed="1000"
						data-start="500"
						data-easing="Power4.easeOut"
						data-endspeed="400"
						data-endeasing="Power1.easeIn"
						style="z-index: 11"><h2>We remain Reliable, Professional and Flexible in all our undertakings.</h2>
					</div>

				
				</li> --}}
                
				
			</ul>
			<div class="tp-bannertimer"></div>
		</div>
	</div>
    </div>
 
 <section class="banner-btm clearfix">
   <div class="container">
   
     <div class="col-md-12 no-padding">
     <div class="col-md-3 no-padding bbtm-lft">
       <img src="{{url('project/images/banner-btm.png')}}">
     </div>
     <div class="col-md-9 no-padding bbtm-rgt text-center">
        <!--<div id="owl-demo" class="owl-carousel owl-theme">
                <div class="item"><img src="{{url('project/images/bc.svg')}}" alt=""> <p>Building <br> Construction </p></div>
                <div class="item"><img src="{{url('project/images/db.svg')}}" alt=""> <p>Design  <br> and Build </p></div>
                <div class="item"><img src="{{url('project/images/bm.svg')}}" alt=""> <p>Building  <br> Maintenance  </p></div>
                <div class="item"><img src="{{url('project/images/cp.svg')}}" alt=""> <p>Construction <br> Planning </p></div>
                <div class="item"><img src="{{url('project/images/brr.svg')}}" alt=""> <p>Building  <br> Renovation </p></div>
                <div class="item"><img src="{{url('project/images/ps.svg')}}" alt=""> <p>Professional  <br> services</p></div>
            </div>-->
        <div class="col-md-2 col-xs-6  col-sm-4 no-padding"><img src="{{url('project/images/bc.svg')}}" alt=""> <p>Building <br> Construction </p></div>
        <div class="col-md-2 col-xs-6  col-sm-4 no-padding"><img src="{{url('project/images/db.svg')}}" alt=""> <p>Design  <br> and Build </p></div>
        <div class="col-md-2 col-xs-6  col-sm-4 no-padding"><img src="{{url('project/images/bm.svg')}}" alt=""> <p>Building  <br> Maintenance  </p></div>
        <div class="col-md-2 col-xs-6  col-sm-4 no-padding"><img src="{{url('project/images/cp.svg')}}" alt=""> <p>Construction <br> Planning </p></div>
        <div class="col-md-2 col-xs-6  col-sm-4 no-padding"><img src="{{url('project/images/brr.svg')}}" alt=""> <p>Building  <br> Renovation </p></div>
        <div class="col-md-2 col-xs-6  col-sm-4 no-padding"><img src="{{url('project/images/ps.svg')}}" alt=""> <p>Professional  <br> services</p></div>    
   </div>
     
   </div>
   
   </div>
 </section>
 
 <section class="ceo-sec">
   
   <div class="container">
      <div class="col-md-12 no-padding ">
         <div class="row">
           <div class="col-md-3  col-sm-6 ceo-lft clearfix aos-item" data-aos="fade-up">
             <a href="{{url('about')}}">
                <h4>About Bojamhoor</h4>
                <h2>Building what matters in qatar</h2>
                <p>Bojamhoor Trading & Contracting Company. </p>
             </a>
           </div>
           
           <div class="col-md-6 col-sm-6 aos-item" data-aos="fade-down">
              <div class="pj"><a href="{{url('projects')}}">
                <img src="{{url('project/images/pro.jpg')}}" class="img-responsive">
                <h3>Projects</h3>
                </a>
              </div>
           </div>
           
           <div class="col-md-3  col-sm-12 no-padding aos-item" data-aos="fade-up">
             <div class="col-md-12  col-sm-6 no-padding sus">
               <figure><a href="{{url('policies')}}">
                <img src="{{url('project/images/sus.jpg')}}">
                <figcaption><h4>Policies </h4><p>Safeguarding our communities and assets through sustainable building practices.
</p></figcaption>
                </a>
              </figure>
             </div>
             
             <div class="col-md-12 col-sm-6 no-padding bf"><a href="{{url('clients')}}">
               <h4> <div class="pfd"><img src="{{url('project/images/clnt.png')}}"></div> Our <br> Clients</h4><p>View Our Valuable client's</p></a>
             </div>
             
           </div>
           
         </div>
      </div>
      
      <div class="col-md-12 no-padding">
        <div class="row">
           <div class="col-md-4 slo no-padding aos-item" data-aos="fade-right">
              <figure><a href="{{url('resources')}}">
                <img src="{{url('project/images/slo.jpg')}}">
                <figcaption><h4>Staff &amp; Labor Overview </h4><p>Our people build our success story in Qatar’s fast-paced construction industry </p></figcaption>
                </a>
              </figure>
           </div>
           <div class="col-md-8 no-padding aos-item" data-aos="fade-up">
              <div class="ceo clearfix">
                <div class="col-md-6"><img src="{{url('project/images/ceo.jpg')}}"></div>
                <div class="col-md-6"><h5>Message from Chairman</h5><p>Legacy: <br> An Ally and an Enabler</p><a href="{{url('chairman-message')}}" class="ceo-mr"><img src="{{url('project/images/sec1arw.png')}}"></a></div>
              </div>
           </div>
        </div>
      </div>
      
   </div>
 </section>
 
 
 
 <section class="pjct">
    <div class="pjct-hme"></div>
    <div class="container">
       <div class="col-md-12 no-padding">
         <div class="col-md-3 no-padding">
              <h2>Our Latest Projects</h2>
              <p>Get a quick glimpse of our pioneering construction projects in Qatar </p>
              <a href="{{url('projects')}}" class="pa">View all</a>
           </div>
           
           <!--<div class="col-md-9 no-padding">
           <div class="col-md-3"></div>
              <div class="col-md-3"><div class="counting"><div class="counter">390</div><p>Completed Projects</p></div></div>
              <div class="col-md-3"><div class="counting"><div class="counter">400</div><p>happy Clients</p></div></div>
              <div class="col-md-3"><div class="counting"><div class="counter">026</div><p>Years of Trust</p></div></div>
           </div>-->
    </div>
    
    <div class="col-md-12 no-padding">
     <div class="row">
      @foreach($latestProjects as $latestProject)

      <div class="col-md-3 aos-item" data-aos="fade-up">
        <div class="pjct-img tp130"><a href="{{$latestProject->detailPageUrl()}}">
         <div class="pctimg"><img src="{{$latestProject->imageUrl()}}"></div>
         <div class="pct-itxt">
           <h4>{{$latestProject->title}}</h4>
           <p>{{str_limit($latestProject->description,75)}}</p>
         </div></a>
       </div>
     </div>
     @endforeach
          
          {{-- <div class="col-md-3 aos-item" data-aos="fade-down">
            <div class="pjct-img tp40"><a href="gcp.php">
               <div class="pctimg"><img src="{{url('project/images/projects/gcp1.jpg')}}"></div>
                <div class="pct-itxt">
               <h4>Proposed Development of General Cleaning Project </h4>
               <p>Construction, completion and maintenance of Proposed General Cleaning Project...</p>
               </div></a>
            </div>
          </div>
          
          <div class="col-md-3 aos-item" data-aos="fade-up">
            <div class="pjct-img tp90"><a href="al-wajba.php">
               <div class="pctimg"><img src="{{url('project/images/projects/aw1.jpg')}}"></div>
                <div class="pct-itxt">
               <h4>Al Wajba Guards Residence </h4>
               <p>Construction of Compound consisting of 4 Typical Main Building, 8 Indoor Shooting Range...</p>
               </div></a>
            </div>
          </div>
          
          <div class="col-md-3 aos-item" data-aos="fade-down">
            <div class="pjct-img"><a href="abm.php">
               <div class="pctimg"><img src="{{url('project/images/projects/abm1.jpg')}}"></div>
                <div class="pct-itxt">
               <h4>Development of ABM Military College Package No.1 </h4>
               <p>Construction of Administration Building, Officers building, Medical building & Out Door Shooting range building.</p>
               </div></a>
            </div>
          </div> --}}
          
       </div>
    </div>
    
    </div>
 </section>

@endsection
@section('scripts')
<script type="text/javascript" src="{{url('project/js/jquery.themepunch.tools.min.js')}}"></script>
<script type="text/javascript" src="{{url('project/js/jquery.themepunch.revolution.min.js')}}"></script>
<script type="text/javascript">
var revapi;
jQuery(document).ready(function() {
	   revapi = jQuery('.tp-banner').revolution(
		{
			delay:9000,
			startwidth:1170,
			startheight:580,
			hideThumbs:10,
			fullWidth:"on",
			forceFullWidth:"on"
		});
});	
</script>


<script src="{{url('project/js/waypoints.min.js')}}"></script> 
<script src="{{url('project/js/jquery.counterup.min.js')}}"></script> 
<script>
jQuery(document).ready(function( $ ) {
	$('.counter').counterUp({
		delay: 10,
		time: 1000
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
<script src="{{url('project/js/owl.carousel.js')}}"></script>
<script>
$(document).ready(function() {
 $("#owl-demo").owlCarousel({
	margin: 0,
	nav: false,
	loop: false,
	autoplay:true,
	dots:true,
    autoplayTimeout:6000,
	autoplayHoverPause:true,
	responsive: {
	  0: {
		items: 1
	  },
	  600: {
		items: 2
	  },
	  1000: {
		items: 6
	  }
	}
  })
})
</script>

@endsection