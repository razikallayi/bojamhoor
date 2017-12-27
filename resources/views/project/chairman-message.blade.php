@extends('project.layout.master')
@section('page_id','#home')
@section('content')


<div class="tp-space"></div>    
 
 
 <div class="ceo-mes">
   <div class="container">
     <div class="col-md-12 no-padding">
        <div class="row">
          <div class="col-md-5 no-padding">
              <div class="col-md-6 no-padding"><div class="abt-hd"><h2>Chairman Message </h2></div></div>
            <div class="col-md-6"><div class="abt-img "><img src="{{url('project/images/banner-btm.png')}}" class="img-responsive"></div></div>
              <div class="col-md-12 no-padding">
                <div class="chr-img">
              <img src="{{url('project/images/ceo.jpg')}}" class="img-responsive">
              <h4>Khalaf Issa Bojamhoor Al Hassan Al Muhannadi</h4>
              <p>Chairman <br> <span>Bojamhoor Trading & Contracting Co. W.L.L. </span></p>
              </div>
              </div>
              
          </div>
          <div class="col-md-7 no-padding">
           <div class="abt-txt clearfix"><p>In present times when age is a thing of the past, Bojamhoor Trading & Contracting Co. W.L.L. proudly continues to optimize its legacy of multi-disciplinary expertise encompassing building construction and design-build projects while offering value engineering solutions.</p>
           <p>
Established in 1978, we have been among the first in Qatar to pioneer many essential and ground-breaking projects that introduced world-class infrastructure to the citizens of Qatar. Most of our firsts include infrastructural establishments like electricity sub-stations, health-centers and schools across Qatar that today reflect Bojamhoor’s twin-seal of premium vintage and trust.</p>
<p>
Looking forward, as Qatar looks to host the 2022 FIFA World Cup and make the National Vision 2030 a reality, we believe, with our proven track record and reputation, that we are well positioned to endure and partake in this great endeavor. </p>
 <p>
Our values that are ingrained in our employees, combined with high quality and on-budget project delivery, earns us the badge of being a trusted & qualified partner for the Government. This is evident from the fact that among all others, Bojamhoor was chosen for the construction of the first National Security Shield building in Qatar. </p>
<p>
Bojamhoor is a family-owned and operated construction company which has moved seamlessly across each decade of Qatar's progress, from the past century and into today's Millennial Age. Today, thanks to our legacy and committed team of highly experienced engineers and architects, we have diligently contributed to the existing and upcoming sectoral frontiers both as a guide and innovator. Our ultimate goal is to redefine trust and quality in new-age construction design. Through this endearing journey of ups and downs, profit has just been a positive outcome of our commitment to serve Qatar and never a pillar.
 </p>
 <p>As the Chairman of Bojamhoor, since 1998, I assure all our esteemed clients, stakeholders and well-wishers our continued support and services as we usher in the next stage of evolution in Qatar. My previous experience as the Chairman of Central Tender Committee and the sustained support of the members of our family, continues to be my source of inspiration and guidance.</p>
 <p>Yes indeed, age, supported by the foundation of experience, sits fine atop our crest. Rest assured, this is one endeavour which will not wither within a month, a year, a decade or a century in the wake of our endless dreams & infinite possibilities. </p>
 
 
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