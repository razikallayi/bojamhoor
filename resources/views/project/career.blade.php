@extends('project.layout.master')
@section('page_id','')
@section('content')


<div class="tp-space"></div>    
 
 
<div class="career">
  <div class="container">
     <div class="col-md-12 no-padding">
        <div class="col-md-5 no-padding">
          <div class="col-md-6 no-padding"><div class="abt-hd"><h2>Career </h2></div></div>
            <div class="col-md-6"><div class="abt-img "><img src="{{url('project/images/banner-btm.png')}}" class="img-responsive"></div></div>
        </div>
        <div class="col-md-7 no-padding">
         <div class="csec clearfix"><h4>Join our Team for a goal-oriented, lucrative career in Qatar<br> <span>Send us your updated CV. Our team will connect with you, if your profile suits our latest openings. </span></h4>
          <form class="clearfix">
              <div class="col-md-6">
                <div class="form-group"><input type="text" class="form-control" placeholder="Name"></div>
                <div class="form-group"><input type="text" class="form-control" placeholder="E-mail"></div>
                <div class="form-group"><input type="text" class="form-control" placeholder="Phone"></div>
                <div class="form-group"><input type="file" name="file-2[]" id="file-2" class="inputfile inputfile-2" data-multiple-caption="{count} files selected" multiple />
					<label for="file-2"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Upload Your CV &hellip;</span></label></div>
              </div>
              <div class="col-md-6">
                <textarea class="form-control" placeholder="Message"></textarea>
              </div>
              <button class="con-btn">Send Now</button>
          </form>
          </div>
        </div>
     </div>
  </div>
</div> 
 

@endsection
@section('scripts')
<script src="{{url('project/js/header.js')}}" type="text/javascript"></script>

<script>
 'use strict';

;( function ( document, window, index )
{
	var inputs = document.querySelectorAll( '.inputfile' );
	Array.prototype.forEach.call( inputs, function( input )
	{
		var label	 = input.nextElementSibling,
			labelVal = label.innerHTML;

		input.addEventListener( 'change', function( e )
		{
			var fileName = '';
			if( this.files && this.files.length > 1 )
				fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
			else
				fileName = e.target.value.split( '\\' ).pop();

			if( fileName )
				label.querySelector( 'span' ).innerHTML = fileName;
			else
				label.innerHTML = labelVal;
		});
		input.addEventListener( 'focus', function(){ input.classList.add( 'has-focus' ); });
		input.addEventListener( 'blur', function(){ input.classList.remove( 'has-focus' ); });
	});
}( document, window, 0 ));
</script>

<script>
$('.cd-form .cd-email').keyup(function(event){	
	var emailInput = $(this),
		insertedEmail = emailInput.val(),
		atPosition = insertedEmail.indexOf("@");
    	dotPosition = insertedEmail.lastIndexOf(".");
    if (atPosition< 1 || dotPosition<atPosition+2 ) {
    	$('.cd-form').removeClass('is-active').find('.cd-loading').off('webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend');
    } else {
    	$('.cd-form').addClass('is-active');
    }
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
@section('scripts')