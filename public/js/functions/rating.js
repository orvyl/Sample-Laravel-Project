$(document).ready(function() {

	$('.rate-star span').hover(function(){
		var cur_span = $(this);
		var num = cur_span.attr('val');
		var ctr = 0;

		$('span',cur_span.parent()).each(function(){
			if(ctr < num)
				$(this).attr('class','rate');

			ctr++;
		});
	},function(){
		var cur_span = $(this);

		$('span',cur_span.parent()).each(function(){
			if($(this).attr('rated') == '')
				$(this).attr('class','');
		});
	});

	$('.rate-star span').click(function(){
		var cur_span = $(this);
		var num = cur_span.attr('val');
		var ctr = 0;
		var att = cur_span.attr('atrb');

		$('span',cur_span.parent()).attr('rated','');

		$('span',cur_span.parent()).each(function(){
			if(ctr < num)
			{
				$(this).attr('class','rate');
				$(this).attr('rated','true');
			}

			ctr++;
		});

		$('input[name="'+att+'"]').val(num);

	});

});