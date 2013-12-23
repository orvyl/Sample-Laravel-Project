$(document).ready(function() {

	function _generateQ(dval,dtype)
	{
		$.ajax({
			url: BaseUrl+'/shop_create_query',
			data: { dval:dval , dtype:dtype , filters:filters },
			success:function(data){
				window.location.href = data;
			},
			error: function(x,y,z){
				alert('ERROR: Something went wrong. Please try again later.'+z);
			}
		});
	}

	function _updateQ(dval,dtype)
	{
		$.ajax({
			url: BaseUrl+'/shop_update_query',
			data: { dval:dval , dtype:dtype , filters:filters },
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

	$('#gift-1_child .enabled').live('click',function(){
		var val = $('.ddTitleText',this).text();

		_generateQ(val,'sort');
	});

	$('#btncustpr').click(function(){
		var n1 = $('.prcnum1').val();
		var n2 = $('.prcnum2').val();

		if(n1 != '' && n2 != '' && validateDecimalString(n1) && validateDecimalString(n2))
		{
			var dval = n1+'-'+n2;
			var dtype = 'pricer';

			_generateQ(dval,dtype);
		}

		return false;
	})

	$('.remqry').click(function(){
		var dval = $(this).attr('dval');
		var dtype = $(this).attr('dtype');

		_updateQ(dval,dtype);
	});

	$('.prange').click(function(){
		var dval = $(this).attr('dval');
		var dtype = $(this).attr('dtype');

		if($(this).is(':checked'))
			_generateQ(dval,dtype);
		else
			_updateQ(dval,dtype);
	});

	$('.queryst').click(function(){
		var dval = $(this).attr('dval');
		var dtype = $(this).attr('dtype');

		_generateQ(dval,dtype);
	});

});