jQuery(function ($) {
	
	/************************* 
	Variables (tamaños editables)
	**************************/
	
	var browserwidth;
	var largewidth = 1024; // resolución mínima desktop
	var mediumwidth = 767; // resolución mmedia
	var smallwidth = 641; // resolución chica
	
	var mywindow = $(window);
	var htmlbody = $('html,body');
	
	/************************* 
	Ejecución
	**************************/
	
	//Si no soporta archivos en formato SVG
	if (!Modernizr.svg) {
	  $(".logo img").attr("src", "wp-content/themes/nmycia-theme/images/logonmycia.png");
	  $('img[src$=".svg"]').hide();
	}
	
	// Obtiene anchura del browser 	
	function getbrowserwidth(){
		browserwidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth || 0;
		//console.log(browserwidth);
		return browserwidth;
	}
	
	function onLoadAndResize(){  
		getbrowserwidth();
		homeGallery();

		if (browserwidth >= mediumwidth) {
			if ($('body').hasClass('home')) {
				activeItemMenu();
				menuChange();
			}
		} 
		
		if (browserwidth >= largewidth) {
			animationsLarge();
		} else {
			animationsMedium();
		}
				
	}
	
	function homeGallery() {  
		if (browserwidth >= largewidth) {
			fixFlexsliderHeight();  
		}
		
		$('#home-gallery').flexslider({
		    animation: "fade",
		    animationLoop: true,
		    controlNav: true,
		    directionNav: false,
		    smoothHeight: true,
		    start: function(slider){
			     $('#galery-intro').animate({
				   opacity: 1 
			    });
			    
			    if (!('.flexslider ul.slides li:only-child')){
				     $('#home-gallery .inner').delay(500).animate({
					   opacity: 1 
				    }, 400);
			    } else {
				      $('#home-gallery .inner').delay(700).animate({
					   padding: '0px 20px 0',
					   opacity: 1 
				    }, 400);

			    }
		    }
		});
	}
	
	function fixFlexsliderHeight() {
	    // Set fixed height based on the tallest slide
	    $('.flexslider').each(function(){
	        var sliderHeight = 0;
	        $(this).find('.slides > li').each(function(){
	            slideHeight = $(window).height();
	            if (sliderHeight < slideHeight) {
	                sliderHeight = slideHeight;
	            }
	        });
	        $(this).find('ul.slides li img').css({'height' : sliderHeight});
	    });
	}
	
	//scrollto section
	function menuHome() { 
		
		//si es el home		
		var links = $('.menu-main > li > a, .drawer-menu > li > a');
	    var arrowButton = $('.icon-arrow');
	    var target = $(links).attr("href");

		// go to scroll section 
	    function goToByScroll(target) {
	        htmlbody.animate({
	         scrollTop: $(target).offset().top+5
	         }, 1500, 'easeInOutQuint');
	    }
	
		// link animation to section
	    links.click(function (e) {
	        e.preventDefault();
	        target = $(this).attr('href');
	        goToByScroll(target);
	    });
	    
	    // arrow scrollto section
	    arrowButton.click(function (e) {
	        e.preventDefault();
	        dataslide = $(this).attr('href');
	        goToByScroll(dataslide);
	    });
  			  
	}
	
	//add class active
	function activeItemMenu() {
		
		var lastId,
	    topMenu = $(".menu-main"),
	    topMenuHeight = topMenu.outerHeight()+145,
	    menuItems = $(".menu-main > li > a"),
	    scrollItems = menuItems.map(function(){
	      var item = $($(this).attr("href"));
	      if (item.length) { return item; }
	    });
	    
	    $(window).scroll(function(){
	    var fromTop = $(this).scrollTop()+topMenuHeight;
	    var cur = scrollItems.map(function(){
	     	if ($(this).offset().top < fromTop)
		       return this;
	    });
	
	   cur = cur[cur.length-1];
	   var id = cur && cur.length ? cur[0].id : "";
	   
	   	if (lastId !== id) {
	       lastId = id;
	       menuItems
	         .parent().removeClass("active")
	         .end().filter("[href=#"+id+"]").parent().addClass("active");
	   	}                   
	  });  

	}
	
	function menuChange() { 

	    var content = $("#home-gallery .text").offset().top;
	    var header = $("#header");
	    var homeHeader = $(".home #header");
	    var previousScroll = 0;
	    
	    if (browserwidth >= mediumwidth) {
	    	document.addEventListener("scroll", Scroll, false);
	    }
	
	    function Scroll() {
	       var currentScroll = $(this).scrollTop();
		   //console.log( currentScroll, previousScroll);
	       if (currentScroll > previousScroll){
		       $('#header').removeClass('mini');
		       
		       if (previousScroll >=100) {
		       	 $('#header').addClass('effect');
		       } else {
			      $('#header').removeClass('effect');  
		       }
	       } else {
	          if (previousScroll >=100) {
			      $('#header').addClass('mini');
			      $('#header').removeClass('effect');
		       } else {
	           	  $('#header').removeClass('mini');
	           }
	          
	       }
	       
	       previousScroll = currentScroll;
	    }

	}
	
	function menuPages() {
		//Menu pages 
		var _href = $('.menu-main > li > a, #footer .menu  a, .drawer-menu > li > a');
		var page = $("html, body");
		
		$(_href).each(function() {
		   _href = $(this).attr("href"); 
		   
		   $(this).attr("href",'/'+ _href);
		   
		   //console.log(_href);
		});
		
	    var jump=function(e) {
	       if (e){
	           e.preventDefault();
	           var target = $(this).attr("href");
	       } else {
	           var target = location.hash;
	       }
	       
	       page.on("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove", function(){
		       page.stop();
		    });
		    
		    page.animate({ 
			    scrollTop: $(target).offset().top }, 1000, function(){
				    location.hash = target;
					page.off("scroll mousedown wheel DOMMouseScroll mousewheel keyup touchmove");
			});
	
	    }
	
	    page.hide();
        $('a[href^=#]').bind("click", jump);

        if (location.hash){
            setTimeout(function(){
                $('html, body').scrollTop(0).show()
                jump()
            }, 0);
        }else{
          page.show()
        }

	}
	
	function animationsMedium(){   
		$('.content-section').waypoint(function(){
			$('.content-section').addClass('animacion-slide1');
		}, { offset: '70%'});
		$('.featured-section').waypoint(function(){
			$('.featured-section').addClass('animacion-slide2');
		}, { offset: '70%'});
		$('.areas-section').waypoint(function(){
			$('.areas-section').addClass('animacion-slide3');
		}, { offset: '70%'});
		$('.aditional-section').waypoint(function(){
			$('.aditional-section').stop().addClass('animacion-slide4');
		}, { offset: '90%'});
	}
	
	function animationsLarge(){   
		$('.content-section').waypoint(function(){
			$('.content-section').addClass('animacion-slide1');
		}, { offset: '50%'});
		$('.featured-section').waypoint(function(){
			$('.featured-section').addClass('animacion-slide2');
		}, { offset: '50%'});
		$('.areas-section').waypoint(function(){
			$('.areas-section').addClass('animacion-slide3');
		}, { offset: '50%'});
		$('.aditional-section').waypoint(function(){
			$('.aditional-section').stop().addClass('animacion-slide4');
		}, { offset: '60%'});
	}
	
	function menudesplegable(){
	    $("ul.menu-main").superfish({
	      delay:100,
	      animation:{opacity:'show',height:'show'},
	      speed:'fast',
	      autoArrows:false,
	      dropShadows:true});
  	}


	/************************* 
	Ejecución
	**************************/

	$(window).load(function() {
	    onLoadAndResize();
	   
		if ($('body').hasClass('home')) {	
			menuHome();
		} else {
			menuPages();
		}
		
		$(".drawer").drawer();
   		$('.drawer-menu > li > a').click(function (e) {
		  $('.drawer').drawer('close');
		});
		
		if(browserwidth >= mediumwidth){
			menudesplegable();
    	}

	});

	$(window).resize(function(){
		onLoadAndResize();
	});
	
	// si tiene foundation
	$(document).foundation({});

});
