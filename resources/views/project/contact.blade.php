@extends('project.layout.master')
@section('page_id','#contact')
@section('content')


<div class="tp-space"></div>    
 
 
<div class="con">
  <div class="container">
     <div class="col-md-12 no-padding">
      <div class="row">
        <div class="col-md-12">
         <div class="col-md-5 no-padding">
          <div class="col-md-6 no-padding"><div class="abt-hd"><h2>Contact Us</h2></div></div>
          <div class="col-md-6"><div class="abt-img "><img src="{{url('project/images/banner-btm.png')}}" class="img-responsive"></div></div>
         </div>
        </div>
         <div class="col-md-12 no-padding margin-top-50">
         <div class="col-md-5 no-padding"><div id="map_canvas"></div></div>
        <div class="col-md-7 no-padding">
         <div class="csec clearfix"><h4>Reach out to us. We’d love to hear from you <br> <span>In case of a non-urgent issue, you can also email us. We’ll get back to you in 48 hours.</span></h4>
          <form class="clearfix" action="{{url('contact')}}" method="post">
            {{csrf_field()}}
              <div class="col-md-6">
                <div class="form-group"><input name="name" type="text" class="form-control" placeholder="Name"></div>
                <div class="form-group"><input name="email" type="email" class="form-control" placeholder="E-mail"></div>
                <div class="form-group"><input name="phone" type="phone" class="form-control" placeholder="Phone"></div>
              </div>
              <div class="col-md-6">
                <textarea name="message" class="form-control" placeholder="Message"></textarea>
              </div>
              <button type="submit" class="con-btn">Send Now</button>
          </form>
          </div>
        </div>
        </div>
        </div>
     </div>
     
     <div class="col-md-12 no-padding">
        <div class="add clearfix">
             <ul>
               <li><a href="https://www.google.com/maps/place/Bojamhoor+Trading+%26+Contracting+Co./@25.3083096,51.4884919,17z/data=!3m1!4b1!4m5!3m4!1s0x3e45db8fee803609:0x93c2e38e44f256bf!8m2!3d25.3083096!4d51.4906806?hl=en-US" target="_blank"><img src="{{url('project/images/map-maker.png')}}"> Al Jazira Al Arabiya Street (Street 880) Building #22 </a></li>
               <li><a href="tel:+974 4488 0468"><img src="{{url('project/images/phne.png')}}">  +974 4488 0468</a></li>
               <li><a href="tel:+974 4488 0471"><img src="{{url('project/images/fax.png')}}">  +974 4488 0471</a></li>
               <li><a href="mailto:info@bojamhoor.com"><img src="{{url('project/images/mail.png')}}">  info@bojamhoor.com</a></li>
             </ul>
           </div>
     </div>
     
  </div>
</div> 
 



@endsection
@section('scripts')

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

<script type="text/javascript" src="{{url('project/js/jquery.mapit.js')}}"></script>
<script>
 $(document).ready(function() {
	$('#map_canvas').mapit();
 });
</script>



@endsection