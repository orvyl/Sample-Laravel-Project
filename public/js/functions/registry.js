$(document).ready(function() {
	$('#acct-7_child .enabled').live('click',function(){
		var val = $('.ddTitleText',this).text();
		if(val == 'Personal')
			window.location.href = BaseUrl+'/registry/create-registry-personal';
		else if(val == 'Marriage')
		{
			window.location.href = BaseUrl+'/registry/create-registry-marriage';
		}
		else
			window.location.href = BaseUrl+'/registry/create-registry-others';
	});

	$('.cc_info').click(function(){
		$('.cc_info').attr('checked',false);
		$(this).attr('checked',true);
	});

	$('#acct-8_child .enabled').live('click',function(){
		var val = $('.ddTitleText',this).text();
		if(val == 'Same Sex Couple')
		{
			$('#bridelabel1').text('Partner 1 first name:');
			$('#bridelabel2').text('Partner 1 last name:');

			$('#groomlabel1').text('Partner 2 first name:');
			$('#groomlabel2').text('Partner 2 last name:');
		}
		else
		{
			$('#bridelabel1').text('Bride first name:');
			$('#bridelabel2').text('Bride last name:');

			$('#groomlabel1').text('Groom first name:');
			$('#groomlabel2').text('Groom last name:');
		}
	});

});