<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
@yield('meta')
<title>Bojamhoor Trading & Contracting</title>

<link rel="icon" href="{{url(config('whyte.project.favicon'))}}" type="image/x-icon">

<link href="https://fonts.googleapis.com/css?family=Yanone+Kaffeesatz:300,400,700" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Playfair+Display+SC:400,700" rel="stylesheet">
<link rel="stylesheet" href="{{url('project/css/font-awesome.css')}}" type="text/css">
<link rel="stylesheet" href="{{url('project/css/bootstrap.min.css')}}" type="text/css">
<link rel="stylesheet" href="{{url('project/css/stylesheet.css')}}" type="text/css">
@yield('styles')

</head>

<body>



<header>
<div class="page-header">
      <div class="container">
         <div class="col-md-12 no-padding">
            <div class="page-rgt">
               <div class="phn" ><img src="{{url('project/images/iso-9001.png')}}" class="img-responsive"> </div>
               <div class="phn" ><img src="{{url('project/images/iso-14001.png')}}" class="img-responsive"> </div>
               <div class="phn"><img src="{{url('project/images/iso-18001.png')}}" class="img-responsive"></div>
               <div class="phn"><a href="mailto:info@bojahmoor.com"><img src="{{url('project/images/ftr-mail.png')}}"> info@bojahmoor.com</a></div>
               <div class="phn"><a href="tel:+974 4488 0468"><img src="{{url('project/images/phn.svg')}}"> +974 4488 0468</a></div>
            </div>
         </div>
      </div>
    </div>
    
    <nav class="navbar navbar-fixed-top normal">
     <div class="container">
    <div class="navbar-header">
      <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="{{url('/')}}">
          <img src="{{url('project/images/minilogo.png')}}" class="menu__minilogo" />
      <img src="{{url('project/images/logo.png')}}" class="menu__biglogo active" />
        </a>
  </div>
  
  <div class="collapse navbar-collapse js-navbar-collapse">
    <ul class="nav navbar-nav navbar-right">
          <li><a href="{{url('/')}}" id="home">Home</a></li>
          <li><a href="{{url('about')}}" id="about">About </a></li>
          <li><a href="{{url('projects')}}" id="projects">Projects</a></li>
          <li><a href="{{url('resources')}}" id="resources">Resources </a></li>
          <li><a href="{{url('policies')}}"  id="policies">Policies </a></li>
          <li><a href="{{url('clients')}}"  id="clients">Clients </a></li>
          <li><a href="{{url('contact')}}" id="contact">Contact</a></li>
    </ul>
  </div>
    
    </div>
    
  </nav>

</header>





    @yield('content')


 
<footer>
   <div class="container">
     <div class="col-md-12 no-padding">
        <div class="">
          <div class="ftr clearfix">
        <div class="row">
          
          <div class="col-md-5">
            <div class="row">
               <div class="col-md-4"><img src="{{url('project/images/logo.png')}}" class="img-responsive margin-top-100" /></div>
               <div class="col-md-8">
                 <div class="ftr-con clearfix">
            <h4>Contact</h4>
              <h5>Bojamhoor Trading & Contracting W.L.L</h5>
              <ul>
                <li> <a href="https://www.google.com/maps/place/Bojamhoor+Trading+%26+Contracting+Co./@25.3083096,51.4884919,17z/data=!3m1!4b1!4m5!3m4!1s0x3e45db8fee803609:0x93c2e38e44f256bf!8m2!3d25.3083096!4d51.4906806?hl=en-US" target="_blank"><img src="{{url('project/images/ftr-map.png')}}"> Al Jazira Al Arabiya Street (Street 880) Building #22</a></li>
                <li><a href="tel:+974 4488 0468"> <img src="{{url('project/images/phn.png')}}"> +974 4488 0468</a></li>
                <li> <a href="mailto:info@bojahmoor.com"><img src="{{url('project/images/ftr-mail.png')}}"> info@bojahmoor.com </a></li>
              </ul>
              
            </div>
               </div>
            </div>
          </div>
          
          <div class="col-md-4 clearfix">
             <div class="ftr-links clearfix">
                 <h4>Quick Links</h4>
                <ul class="col-md-6 col-xs-5 no-padding">
                   <li><a href="{{url('/')}}">Home</a></li>
                   <li><a href="{{url('about')}}">About</a></li>
                   <li><a href="{{url('projects')}}">Projects</a></li>
                   <li><a href="{{url('contact')}}">Contact </a></li>
                </ul>
                
                <ul class="col-md-6 col-xs-7 no-padding">
                   <li><a href="{{url('chairman-message')}}">Chairman's Message</a></li>
                   <li><a href="{{url('resources')}}">Resources </a></li>
                   <li><a href="{{url('policies')}}">Policies </a></li>
                   <li><a href="{{url('career')}}">Career</a></li>
                </ul>
                
             </div>
          </div>
          
          <div class="col-md-3 no-padding">
            <div class="ftr-iso clearfix">
              <h4>ISO Certifications</h4>
              <ul>
                <li class="clearfix"><img src="{{url('project/images/iso-14001.png')}}"> <p>Enviormental Management System</p></li>
                <li class="clearfix"><img src="{{url('project/images/iso-9001.png')}}"> <p>Quality Management System</p></li>
                <li class="clearfix"><img src="{{url('project/images/iso-18001.png')}}"> <p>Occupational Health & Safety Management</p></li>
              </ul>
              
            </div>
          </div>
          
          <div class="tp"><a href="#top"><img src="{{url('project/images/slider/arw.png')}}"></a></div>
          
          </div>
        </div>
        
        <div class="ftr-lft">© 2017 Bojamhoor Trading & Contracting. All Rights Reserved.</div>
       <div class="ftr-rgt">Powerd by <a href="http://www.whytecreations.com/" target="_blank" rel="dofollow"> <img src="{{url('project/images/whyte.png')}}">  Whyte Company </a></div>
        
        </div>
        
     </div>
   </div>

   
 </footer>
 
 
 
    

<script type="text/javascript" src="{{url('project/js/jquery-2.1.0.min.js')}}"></script>
<script type="text/javascript" src="{{url('project/js/bootstrap.min.js')}}"></script>
<script type="text/javascript">
  $(function() {
    var pgurl = window.location.href.substr(window.location.href
    .lastIndexOf("/")+1);
    $(".navbar-nav>li>a").each(function(){
    if($(this).attr("href") == pgurl || $(this).attr("href") == '' )
      $('a').removeClass('active');
      $("@yield('page_id',"")").addClass("active");
    })
  });
</script>
<script>
  
  $("a[href='#top']").click(function() {
     $("html, body").animate({ scrollTop: 0 }, "slow");
     return false;
  });
   </script>

   <link rel="stylesheet" href="{{url('project/css/aos.css')}}" type="text/css">
   <script type="text/javascript" src="{{url('project/js/aos.js')}}"></script>
   <script>
     AOS.init({
    easing: 'ease-in-out-sine'
     });
   </script>
@yield('scripts')
</body>
</html>
