
	function startTime() {
	  	var today = new Date();
		var h = today.getHours();
		var m = today.getMinutes();
		var s = today.getSeconds();
		m = checkTime(m);
		s = checkTime(s);
		session = "PM";
	  
		if(h > 12){
			h = h - 12;
			session = "AM";
		}
	  
	  	//document.getElementById('MyClockDisplay').innerHTML = h + ":" + m + ":" + s + " "+session;
	  	var t = setTimeout(startTime, 500);

	  	var today = new Date();
		var dd = String(today.getDate()).padStart(2, '0');
		var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
		var yyyy = today.getFullYear();

		document.getElementById('MydateDisplay').innerHTML = dd + '/' + mm + '/' + yyyy +' <br>'+ h + ":" + m + " " + session;
		document.getElementById('MydateDisplay1').innerHTML = dd + '/' + mm + '/' + yyyy +' <br>'+ h + ":" + m + " " + session;
	}
	function checkTime(i) {
	  if (i < 10) {i = "0" + i}; 
	  return i;
	}



	$(document).ready(function () {
	  var trigger = $('.hamburger'),
	      overlay = $('.overlay'),
	     isClosed = false;

	    trigger.click(function () {
	      hamburger_cross();      
	    });


	    function hamburger_cross() {

	      if (isClosed == true) {          
	        overlay.hide();
	        trigger.removeClass('is-open');
	        trigger.addClass('is-closed');
	        isClosed = false;
	      } else {   
	        overlay.show();
	        trigger.removeClass('is-closed');
	        trigger.addClass('is-open');
	        isClosed = true;
	      }
	  }
	  
	  $('[data-toggle="offcanvas"]').click(function () {
	        $('#wrapper').toggleClass('toggled');
	  }); 
	});


	
			
	
			
			
			
				
			