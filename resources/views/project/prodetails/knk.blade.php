<?php session_start();?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />

<title>Bojamhoor Trading & Contracting</title>

<link rel="icon" href="images/favicon.ico" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">
<link rel="stylesheet" href="{{url('project/css/font-awesome.css')}}" type="text/css">
<link rel="stylesheet" href="{{url('project/css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{url('project/css/stylesheet.css')}}" type="text/css">

</head>

<body>

<?php include'header.php';?>


<div class="tp-space"></div>    
 
 
 <div class="pro-slider">
   <div class="container">
      <div class="col-md-12 no-padding">
         <div class="pro-head clearfix">
          <div class="col-md-9 no-padding">
             <h2>Construction of 2 Nos. Kindergarten at Nasseriya and Khartiyat  <br> <span>Traditional</span></h2>
          </div>
          <div class="col-md-3 no-padding">
             <h4><i class="fa fa-check"></i> <span>Project Status</span> <br> Completed</h4>
          </div>
        </div>
		<div class="slider-container"> 
   <div id="slider" class="slider owl-carousel"> 
      <div class="item"><img src="{{url('project/images/projects/knk1.jpg')}}" class="img-responsive"></div> 
      <div class="item"><img src="{{url('project/images/projects/knk2.jpg')}}" class="img-responsive"></div> 
      <div class="item"><img src="{{url('project/images/projects/knk3.jpg')}}" class="img-responsive"></div> 
      <div class="item"><img src="{{url('project/images/projects/knk4.jpg')}}" class="img-responsive"></div> 
      <div class="item"><img src="{{url('project/images/projects/knk5.jpg')}}" class="img-responsive"></div> 
   </div> 
    
</div>

<div class="thumbnail-slider-container"> 
   <div id="thumbnailSlider" class="thumbnail-slider owl-carousel"> 
      <div class="item"><img src="{{url('project/images/projects/knk1.jpg')}}" class="img-responsive"></div> 
      <div class="item"><img src="{{url('project/images/projects/knk2.jpg')}}" class="img-responsive"></div> 
      <div class="item"><img src="{{url('project/images/projects/knk3.jpg')}}" class="img-responsive"></div> 
      <div class="item"><img src="{{url('project/images/projects/knk4.jpg')}}" class="img-responsive"></div> 
      <div class="item"><img src="{{url('project/images/projects/knk5.jpg')}}" class="img-responsive"></div> 
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
                   <li class="clearfix"><span>Client :</span><span>ASHGHAL Building Affairs </span></li>
                   <li class="clearfix"><span>Project Value  : </span><span>  32,000,000.00 </span></li>
                   <li class="clearfix"><span>Completion Date : </span><span>23.02.2009</span></li>
                </ul>
             </div>
             <div class="col-md-6">
             <h4>Project Discription</h4>
               <p>For ASHGHAL, Bojamhoor successfully constructed two kindergarten schools at Al Nasiriya and  Al Khratiyat</p>
             </div>
          </div>
        </div>
        
        <div class="pro-map"><iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d57736.000437243936!2d51.53817627053223!3d25.25375952697741!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sqa!4v1497351563579" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe></div>
        
        <div class="op">
          <h2>Our Projects</h2>
          <div class="row">
            <div class="col-md-4">
              <div class="proj aos-item" data-aos="fade-down"><a href="gcp.html">
                  <div class="proj-img"><img src="{{url('project/images/projects/gcp1.jpg')}}" class="img-responsive"><div class="st">Completed</div></div>
                  <h4>Proposed Development of General Cleaning Project</h4>
                  </a>
               </div>
            </div>
            
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
            </div>
            
          </div>
        </div>
        
     </div>
  </div>
</div>


 
 
 
<?php include'footer.php';?>   

<script type="text/javascript" src="{{url('project/js/jquery-2.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{url('project/js/bootstrap.min.js')}}"></script>
<script src="{{url('project/js/header.js')}}" type="text/javascript"></script>
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

<script type="text/javascript">
  $(function() {
    var pgurl = window.location.href.substr(window.location.href
    .lastIndexOf("/")+1);
    $(".navbar-nav>li>a").each(function(){
    if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
      $('a').removeClass('active');
      $("#projects").addClass("active");
    })
  });
</script>
<script>
  
  $("a[href='#top']").click(function() {
     $("html, body").animate({ scrollTop: 0 }, "slow");
     return false;
  });

 </script>

</body>
</html>
