@extends('project.layout.master')
@section('page_id','#projects')
@section('content')


<div class="tp-space"></div>  

<div class="project">
  <div class="container">
    <div class="col-md-12 no-padding">
    <div class="col-md-5 no-padding"> <div class="col-md-6 no-padding"></div>
            <div class="col-md-6"><div class="abt-img "><img src="{{url('project/images/banner-btm.png')}}" class="img-responsive"></div></div></div>
      <div class="col-md-7 no-padding"><p>Explore our prestigious construction projects in Qatar that stem from collaborative engagement, design-build innovation and our quest for a sustainable future. </p></div>
      
      <div class="slct ">
        <select class="filters-select selectpicker">
            <option value="*">Major Projects</option>
            <option value=".Completed">Completed</option>
            <option value=".Ongoing">Ongoing</option>
            <option value=".Upcoming">Upcoming</option>
        </select>
        </div>
        <div class="grid">
           <div class="col-md-12 no-padding">
            @foreach($projects as $project)
            <div class="element-item transition {{$project->getProjectStatus()}} " data-category="transition">
               <div class="proj" ><a href="{{$project->detailPageUrl()}}">
                  <div class="proj-img"><img src="{{$project->imageUrl()}}" class="img-responsive"><div class="st">{{$project->getProjectStatus()}}</div></div>
                  <h4>{{$project->title}}</h4>
                  </a>
               </div>
            </div>
            @endforeach
            {{-- 
            <div class="element-item transition Completed " data-category="transition">
               <div class="proj" ><a href="knk.php">
                  <div class="proj-img"><img src="{{url('project/images/projects/knk3.jpg')}}" class="img-responsive"><div class="st">Completed</div></div>
                  <h4>Construction of 2 Nos. Kindergarten at Nasseriya and Khartiyat</h4>
                  </a>
               </div>
            </div>

            <div class="element-item transition Completed " data-category="transition">
               <div class="proj" ><a href="abm.php">
                  <div class="proj-img"><img src="{{url('project/images/projects/abm2.jpg')}}" class="img-responsive"><div class="st">Completed</div></div>
                  <h4>Development of ABM Military College Package No.1</h4>
                  </a>
               </div>
            </div>
            
            <div class="element-item transition Completed" data-category="transition">
               <div class="proj"><a href="al-wajba.php">
                  <div class="proj-img"><img src="{{url('project/images/projects/aw1.jpg')}}" class="img-responsive"><div class="st">Completed</div></div>
                  <h4> Al Wajba Guards Residence</h4>
                  </a>
               </div>
            </div>
            
            
            
            </div>
            
            <div class="col-md-12 no-padding">
            <div class="element-item transition Completed " data-category="transition">
               <div class="proj" ><a href="gcp.php">
                  <div class="proj-img"><img src="{{url('project/images/projects/gcp1.jpg')}}" class="img-responsive"><div class="st">Completed</div></div>
                  <h4>Proposed Development of General Cleaning Project</h4>
                  </a>
               </div>
            </div>
            
            <div class="element-item transition Completed" data-category="transition">
               <div class="proj" ><a href="fourtyfour-villas.php">
                  <div class="proj-img"><img src="{{url('project/images/projects/ff2.jpg')}}" class="img-responsive"><div class="st">Completed</div></div>
                  <h4>44 Villas (G+1+PH) Project For M/s. Transind Holding</h4>
                  </a>
               </div>
            </div>
            
            <div class="element-item transition Completed " data-category="transition" >
               <div class="proj"><a href="tbz.php">
                  <div class="proj-img"><img src="{{url('project/images/projects/tbz1.jpg')}}" class="img-responsive"><div class="st">Completed</div></div>
                  <h4>Regeneration of Tarek Bin Ziad School ( Design &amp; Build)</h4>
                  </a>
               </div>
            </div>
            </div>
            
            <div class="col-md-12 no-padding">
            <div class="element-item transition Ongoing" data-category="transition">
               <div class="proj " ><a href="ucp.php">
                  <div class="proj-img"><img src="{{url('project/images/projects/cp1.jpg')}}" class="img-responsive"><div class="st"> On going </div></div>
                  <h4>Doha Grand Park – Phase 1 – Underground Car Parking 5 and 6.</h4>
                  </a>
               </div>
            </div>
            
            <div class="element-item transition Ongoing" data-category="transition">
               <div class="proj" ><a href="ucp7.php">
                  <div class="proj-img"><img src="{{url('project/images/projects/cp7_1.jpg')}}" class="img-responsive"><div class="st">On going</div></div>
                  <h4>Doha Grand Park – Phase 1 – Underground Car Parking 7A and 7B.</h4>
                  </a>
               </div>
            </div>
            
            <div class="element-item transition  Completed " data-category="transition">
               <div class="proj" ><a href="obp.php">
                  <div class="proj-img"><img src="{{url('project/images/projects/obp1.jpg')}}" class="img-responsive"><div class="st"> Completed 
</div></div>
                  <h4>Officer’s Buildings Number (1 & 2) at Barzan Camp.</h4>
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
<script src="{{url('project/js/isotope.pkgd.js')}}"></script>
<script>
var $grid = $('.grid').isotope({
  itemSelector: '.element-item',
  layoutMode: 'fitRows'
});
var filterFns = {
  numberGreaterThan50: function() {
    var number = $(this).find('.number').text();
    return parseInt( number, 10 ) > 50;
  },
  ium: function() {
    var name = $(this).find('.name').text();
    return name.match( /ium$/ );
  }
};
$('.filters-select').on( 'change', function() {
  var filterValue = this.value;
  filterValue = filterFns[ filterValue ] || filterValue;
  $grid.isotope({ filter: filterValue });
});
</script>
<script type="text/javascript" src="{{url('project/js/aos.js')}}"></script>
<script>
  AOS.init({
	easing: 'ease-in-out-sine'
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

@endsection