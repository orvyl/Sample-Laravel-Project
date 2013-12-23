$(document).ready(function() {
	$('.updorder').click(function(){

		var order = '';

		$('.order-txt').each(function(){
			order = order+$(this).attr('occid')+'->'+$(this).val()+'|';
		});

		$.ajax({
			url: BaseUrl+'/admin/occasions/reorder',
			data: {order:order},
			success: function(data){
				if(data == '1')
				{
					$('#msg-orderupd').slideDown('fast');
				}
			},
			error: function(){
				alert('ERROR: Something went wrong. Please try again later.');
			}
		});
	});

	$('.updorder1').click(function(){

		var order = '';

		$('.order-txt').each(function(){
			order = order+$(this).attr('occid')+'->'+$(this).val()+'|';
		});

		$.ajax({
			url: BaseUrl+'/admin/occasions/reorderocc',
			data: {order:order},
			success: function(data){
				if(data == '1')
				{
					$('#msg-orderupd').slideDown('fast');
				}
			},
			error: function(){
				alert('ERROR: Something went wrong. Please try again later.');
			}
		});
	});
});