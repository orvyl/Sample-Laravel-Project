$(document).ready(function() {

	function _generateQ(dval,dtype)
	{
		$.ajax({
			url: BaseUrl+'/shop_create_query',
			data: { dval:dval , dtype:dtype , filters:[] },
			success:function(data){
				window.location.href = data;
			},
			error: function(x,y,z){
				alert('ERROR: Something went wrong. Please try again later.'+z);
			}
		});
	}

	function validateDecimalString(inputString)
	{
	    return inputString.match(/^[0-9]*\.?[0-9]*$/);
	}

	$('.queryst').click(function(){
		var dval = $(this).attr('dval');
		var dtype = $(this).attr('dtype');

		_generateQ(dval,dtype);
	});

	$('.prange').click(function(){
		var dval = $(this).attr('dval');
		var dtype = $(this).attr('dtype');

		_generateQ(dval,dtype);
	});

	$('#btncustpr1').click(function(){
		var n1 = $('.prcnum11').val();
		var n2 = $('.prcnum21').val();

		if(n1 != '' && n2 != '' && validateDecimalString(n1) && validateDecimalString(n2))
		{
			var dval = n1+'-'+n2;
			var dtype = 'pricer';

			_generateQ(dval,dtype);
		}

		return false;
	});

	$('#btncustpr2').click(function(){
		var n1 = $('.prcnum12').val();
		var n2 = $('.prcnum22').val();

		if(n1 != '' && n2 != '' && validateDecimalString(n1) && validateDecimalString(n2))
		{
			var dval = n1+'-'+n2;
			var dtype = 'pricer';

			_generateQ(dval,dtype);
		}

		return false;
	});

	$('.home-carousel').flexslider({
		slideshow: true, 
		direction: "horizontal", 
		animation: "slide",
		animationLoop: true,
		itemWidth: 170,
		itemMargin: 0,
		controlNav: false,
		slideshowSpeed: 4000,
		touch: true,
		start: function(slider) {
			$(".flex-direction-nav a , #carousel .slides li img").click(function(event){
				$('#slider').flexslider("play");
			});
		}
	});
});