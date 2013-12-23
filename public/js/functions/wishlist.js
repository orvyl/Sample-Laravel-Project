$(document).ready(function() {

	$('#rl-upl').change(function(){
		$('#loadimgjq').attr('src',BaseUrl+'/uploads/products/thumbnail_default.jpg');

		var fl = this.files[0];
		var freader = new FileReader();

		freader.readAsDataURL(fl);
		freader.onloadend = function(e) {
			$('#loadimgjq').attr('src',e.target.result);
		}

		$('#name-file').text('...');
		$('#name-file').text($(this).val());
	});

	$('#fk-upl').click(function(){
		$('#rl-upl').click();
	})

});

// $(window).bind('beforeunload', function(){
// 	return 'Are you sure you want to leave?';
// });