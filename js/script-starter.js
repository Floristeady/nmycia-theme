jQuery(function ($) {
	
	/************************* 
	Variables (tama�os editables)
	**************************/
	
	var browserwidth;
	var largewidth = 1024; // resoluci�n m�nima desktop
	var mediumwidth = 767; // resoluci�n mmedia
	var smallwidth = 641; // resoluci�n chica
	
	/************************* 
	Ejecuci�n
	**************************/
	
	// Obtiene anchura del browser 	
	function getbrowserwidth(){
		browserwidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth || 0;
		//console.log(browserwidth);
		return browserwidth;
	}
	
	function onLoadAndResize(){  
		getbrowserwidth();
		homeGallery();
	}
	
	function homeGallery() {    
		$('#home-gallery').flexslider({
		    animation: "fade",
		    animationLoop: true,
		    controlNav: true,
		    directionNav: false,
		    start: function(slider){
			     $('#galery-intro').animate({
				   opacity: 1 
			    });
		    }
		});
	}


	/************************* 
	Ejecuci�n
	**************************/

	$(window).load(function() {
	   onLoadAndResize();
	});

	$(window).resize(function(){
		onLoadAndResize();
	});
	
	// si tiene foundation
	$(document).foundation({});

});
