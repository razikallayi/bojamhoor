@extends('project.layout.master')
@section('page_id','#resources')
@section('content')

<div class="tp-space"></div>    
 
<div class="resour-sec">
  <div class="container">
     <div class="col-md-12 no-padding">
        <div class="">
          <div class="col-md-5 no-padding">
            <div class="col-md-6 no-padding"><div class="abt-hd"><h2>Resources </h2></div></div>
            <div class="col-md-6"><div class="abt-img "><img src="{{url('project/images/banner-btm.png')}}" class="img-responsive"></div></div>
           </div>
          <div class="col-md-7 no-padding">
           <div class="abt-txt clearfix"><p>
Bojamhoor is a development oriented company known for its excellence in leadership, integrity and innovation. Our resources meet the highest level of safety and quality standards and provide detailed estimates for project cost control, project management and project completion for diverse design-build tasks. </p>
           </div>
          </div>
        </div>
        
     </div>
  </div>
</div> 
 
<div class="resou">
  <div class="container">
  	<div class="col-md-12 no-padding">
       <div class="tabs">
  <div class="tab">
    <div class="tab-toggle"> Staff & Manpower</div>
  </div>
  <div class="content">
     <h4>Staff & Manpower</h4>
        <div class="owl-carousel owl-theme owl-demo">
            <div class="item"><img src="{{url('project/images/sm.jpg')}}"></div>
        </div>
     <p>At Bojamhoor, we value our employees as our greatest assets. </p>
<p>
With a team of over 1800+ staff, we employ highly skilled individuals for every service level as it plays a pivotal role in adding to Bojamhoor’s legacy. With an inclusive outlook towards each task, every construction project we undertake is a culmination of our team’s perseverance, detail-orientation, dedication and hard work. </p>
<p>
An integrated team approach guarantees strategic project planning and management across our range of construction services in Qatar. Bojamhoor staff is expertly certified, trained and diligently committed to meeting and surpassing our clients' expectations with quality workmanship and adherence to international QA/QC standards.  </p>
<p>

An ISO certified company, Bojamhoor deeply cares about safeguarding the health and well-being of its employees. We adhere to the highest standards of Quality, Health, Safety and Environment (QHSE) and occupational safety standards, taking every preventive measure to ensure the safety and success of our workforce across construction sites, workshops and PMV facilities.</p>
<p>
Our team identifies challenges in a timely manner and overcomes them with cutting edge solutions that befit the project’s budget and schedule.</p>
<p>
Our client's core needs drive the ongoing development of every architectural and construction services. Our team displays an unparalleled depth of experience and technical expertise to get a holistic understanding of their project needs. </p>
<p>
We believe our onsite success is a collaborative achievement of our staff, clients, consultants, suppliers and sub-contractors, all of who work tirelessly to meet targets on time, every time.  	


</p>

  </div>
  <div class="tab">
    <div class="tab-toggle">Equipment Fleet</div>
  </div>
  <div class="content">
     <h4>Equipment Fleet</h4>
     <div class="owl-carousel owl-theme owl-demo">
            <div class="item"><img src="{{url('project/images/ef.jpg')}}"></div>
        </div>
     <p>Bojamhoor offers an impressive fleet of light passeger vehicles besides a wide range of heavy equipment and task oriented tools from some of the most renowned Original Equipment Manufacturers (OEM). We operate and manage an equipment fleet of 330+ light and heavy vehicles that are essentially required at construction sites.</p>
<p>
Bojamhoor’s equipment fleet can be readily mobilized to any location within Qatar.
Our equipment fleet is operated and maintained by expert drivers and operators who are adept at activities like earth moving, excavation and transportation.</p>
<p>
Our fleet comprises a wide range of heavy equipment ranging from excavators, backhoe loaders, wheel loaders, forklifts, telehandler, along with a variety of trailer and trucks and more. Our light vehicles include passenger cars, mini buses, vans and pick up vehicles.</p>
<p>
With our highly qualified staff and experienced technicians, you can be assured that the equipment will function without breakdowns and receive regular maintenance for superior on-site performance.</p>
<p>
Overall, our team ensures a seamless execution of any demanding construction project in Qatar.

</p>

  </div>
  
  <div class="tab">
    <div class="tab-toggle" id="class2"> Organization Structure</div>
  </div>
  <div class="content">
     <img src="{{url('project/images/ochart.jpg')}}" class="img-responsive">

  </div>
  
  
</div>
    </div>
  </div>
</div> 

 
 @endsection
@section('scripts')

<script src="{{url('project/js/header.js')}}" type="text/javascript"></script>
<script>
wrapper = $('.tabs');
tabs = wrapper.find('.tab');
tabToggle = wrapper.find('.tab-toggle');
function openTab() {
    var content = $(this).parent().next('.content'), activeItems = wrapper.find('.active');
    if (!$(this).hasClass('active')) {
        $(this).add(content).add(activeItems).toggleClass('active');
        wrapper.css('min-height', content.outerHeight());
    }
}
;
tabToggle.on('click', openTab);
$(window).load(function () {
    tabToggle.first().trigger('click');
});

</script>
<script src="{{url('project/js/owl.carousel.js')}}" type="text/javascript"></script>
<script>
$(document).ready(function() {
 $(".owl-demo").owlCarousel({
	margin: 10,
	nav: false,
	loop: false,
	autoplay:true,
	dots:false,
    autoplayTimeout:4000,
	autoplayHoverPause:true,
	responsive: {
	  0: {
		items: 1
	  },
	  600: {
		items: 1
	  },
	  1000: {
		items: 1
	  }
	}
  })
})

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

@endsection