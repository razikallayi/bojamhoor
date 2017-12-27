@extends('project.layout.master')
@section('page_id','#clients')
@section('content')


<div class="tp-space"></div>    
 
<div class="resour-sec">
  <div class="container">
     <div class="col-md-12 no-padding">
        <div class="">
          <div class="col-md-5 no-padding">
            <div class="col-md-6 no-padding"><div class="abt-hd"><h2>Our Clients </h2></div></div>
            <div class="col-md-6"><div class="abt-img "><img src="{{url('project/images/banner-btm.png')}}" class="img-responsive"></div></div>
           </div>
          <div class="col-md-7 no-padding">
           <div class="abt-txt clearfix"><p>
Bojamhoor offers clients an integrated approach to meet their ever-rising need for reliable construction services. 
Our prestigious clientele in Qatar reflects our excellence in quality and innovation.  </p>
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
    <div class="tab-toggle">Clients</div>
  </div>
  <div class="content clearfix">
     <h4>Clients</h4>
        
       <div class="clnt clearfix">
         <ul>
           <li><img src="{{url('project/images/clients/client1.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client2.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client3.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client4.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client5.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client6.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client7.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client8.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client9.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client10.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client11.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client12.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client13.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client14.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/client15.jpg')}}"></li>
         </ul>
         
       </div>


  </div>
  <div class="tab">
    <div class="tab-toggle">Consultants</div>
  </div>
  <div class="content clearfix">
     <h4>Consultants</h4>
     
     <div class="clnt clearfix">
         <ul>
           <li><img src="{{url('project/images/clients/con1.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con2.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con3.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con4.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con5.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con6.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con7.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con8.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con9.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con10.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con11.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con12.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con13.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con14.jpg')}}"></li>
           <li><img src="{{url('project/images/clients/con15.jpg')}}"></li>
         </ul>
         
       </div>

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