$(window).load(function(){
	$('#carousel').flexslider({
		animation: "slide",
		controlNav: false,
		directionNav: false,
		animationLoop: true,
		slideshow: true,
		itemWidth: 91,
		itemMargin: 0,
		asNavFor: '#slider',
		slideshowSpeed: 2500
	});

	$('#slider').flexslider({
		animation: "slide",
		controlNav: false,
		directionNav: false,
		animationLoop: true,
		slideshow: true,
		sync: "#carousel",
		slideshowSpeed: 2500
	});

});