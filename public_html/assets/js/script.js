$(document).ready(function() {
	deviceWidth = window.innerWidth;

	$("#navigation_display").click(function() {

		$navigationList = $(".navigation_list");

		$navigationList.slideToggle().css('display', 'flex');

		if($navigationList.css('display') == 'block') {
			$navigationList.css('display', '-webkit-flex');
		}

	});

	$(".logo_header").resize(function(event) {
		
		console.log(event);
		if(window.innerWidth < 700) {
			$(".navigation_list").hide();	
		}else {
			$(".navigation_list").show();
		}


	});




});

