(function($) {
//initiate the plugin and pass the id of the div containing gallery images
$( document ).ready(function() {


	//pass the images to Fancybox
	var currentValue = 0;
	$(".zoom_03").bind("click", function(e) {  
		currentValue = parseInt($(this).attr("data-index"));
		changeText();

		console.log("currentValue: " + currentValue);
	  var ez =   $('#zoom_03').data('elevateZoom');	

		$.fancybox(ez.getGalleryList());

	  return false;
	});

	// Search photo from DB
	var bImageArray = [];
	var sImageArray = [];
	$.ajax({
        method: "POST",
        url: "server.php",
        data: { searchPhoto:"1"}
    })
    .done(function( response ) {
    	var largeImagePath = "vendor/elevatezoom-master/images/large/";
    	var smallImagePath = "vendor/elevatezoom-master/images/small/";
    	var thumbImagePath = "vendor/elevatezoom-master/images/thumb/";
    	$.each( response, function( index, obj ){
    		// Default large image
    		if(index == 0){
    			$("#zoom_01").attr("data-zoom-image",largeImagePath + obj['bImage']).attr("src",smallImagePath+obj['sImage']);
    		}
    		
			$("#image"+(index + 1) + "Link").attr("data-zoom-image",largeImagePath + obj['bImage']).attr("data-image",smallImagePath+obj['sImage']);
	        $("#image"+(index + 1) + "Link img").attr("src",thumbImagePath+obj['bImage']);
	        $("#image"+(index + 1) + "Description").html(obj['description']);
	        bImageArray.push(obj['bImage']);
	        sImageArray.push(obj['sImage']);
	        
    	});

    	    $("#zoom_01").elevateZoom(
		    	{gallery:'gal1', cursor: 'pointer', galleryActiveClass: 'active', imageCrossfade: false, loadingIcon: false,
				    onZoomedImageLoaded:function(z){
			    		$( ".zoomContainer" )
						  .mouseover(function() {
						  	
						    stopTimer();
						  })
						  .mouseout(function() {
						  	
						    startTimer();
						  });
		 }}); 
    });


	var timer;
	function startTimer() {
		timer = self.setInterval(function(){ changeImage(); },3000);
	}

	function stopTimer() {
		$("#zoom_01").removeClass("nypFade");
		clearInterval(timer);

	}

	startTimer();

	
	function changeImage(){
			currentValue += 1;
			currentValue %= 4;
		   // if(currentValue == 0){    
		   // smallImage = 'vendor/elevatezoom-master/images/small/image1.png';
		   // largeImage = 'vendor/elevatezoom-master/images/large/image1.jpg';
		   // }
		   // if(currentValue == 1){    
		   // smallImage = 'vendor/elevatezoom-master/images/small/image2.png';
		   // largeImage = 'vendor/elevatezoom-master/images/large/image2.jpg';
		   // }
		   // if(currentValue == 2){    
		   // smallImage = 'vendor/elevatezoom-master/images/small/image3.png';
		   // largeImage = 'vendor/elevatezoom-master/images/large/image3.jpg';
		   // }
		   // if(currentValue == 3){    
		   // smallImage = 'vendor/elevatezoom-master/images/small/image4.png';
		   // largeImage = 'vendor/elevatezoom-master/images/large/image4.jpg';
		   // }

		   if(currentValue == 0){    
		   	smallImage = 'vendor/elevatezoom-master/images/small/'+sImageArray[0];
		   	largeImage = 'vendor/elevatezoom-master/images/large/'+bImageArray[0];
		   }
		   if(currentValue == 1){    
		   	smallImage = 'vendor/elevatezoom-master/images/small/'+sImageArray[1];
		   	largeImage = 'vendor/elevatezoom-master/images/large/'+bImageArray[1];
		   }
		   if(currentValue == 2){    
		   	smallImage = 'vendor/elevatezoom-master/images/small/'+sImageArray[2];
		   	largeImage = 'vendor/elevatezoom-master/images/large/'+bImageArray[2];
		   }
		   if(currentValue == 3){    
		   	smallImage = 'vendor/elevatezoom-master/images/small/'+sImageArray[3];
		   	largeImage = 'vendor/elevatezoom-master/images/large/'+bImageArray[3];
		   }

		   changeText();

			// Example of using Active Gallery
			$("#zoom_01").addClass("nypFade");
		  $('#gallery_09 a').removeClass('active').eq(currentValue-1).addClass('active');		
		 
		 
		 	 var ez =   $('#zoom_01').data('elevateZoom');	  
		   
		  	ez.swaptheimage(smallImage, largeImage); 
	}

	function changeText(){
		for(var i=0;i<4;i++){
	   		if(i==currentValue){
	   			$("#text"+(i+1)).removeClass("hidden");
	   		}else {
	   			$("#text"+(i+1)).addClass("hidden");
	   		}
	   }
	}


});

})(jQuery); // End of use strict

