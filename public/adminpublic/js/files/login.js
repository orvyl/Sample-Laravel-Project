$(document).ready(function() {
	$(function(){
		// Checking for CSS 3D transformation support
		$.support.css3d = supportsCSS3D();
		
		var formContainer = $('.loginWrapper');
		
		// Listening for clicks on the ribbon links
		$('.flip').click(function(e){
			txt = $(this).attr('title');
			if(txt == 'Forgot password?')
				$(this).attr('title','Go back to LOGIN');
			else
				$(this).attr('title','Forgot password?');
			// Flipping the forms
			formContainer.toggleClass('flipped');
			
			// If there is no CSS3 3D support, simply
			// hide the login form (exposing the recover one)
			if(!$.support.css3d){
				$('#login').toggle();
			}

			$('.loginval .error').text('');
			e.preventDefault();
		});
		
		formContainer.find('form').submit(function(e){
			// Preventing form submissions. If you implement
			// a backend, you might want to remove this code
			//e.preventDefault();
		});
		
		
		// A helper function that checks for the 
		// support of the 3D CSS3 transformations.
		function supportsCSS3D() {
			var props = [
				'perspectiveProperty', 'WebkitPerspective', 'MozPerspective'
			], testDom = document.createElement('a');
			  
			for(var i=0; i<props.length; i++){
				if(props[i] in testDom.style){
					return true;
				}
			}
			
			return false;
		}
	});

	/*Added by Vyl*/
	$('.loginval input[type="submit"]').click(function(){
		em = $('.loginval input[type="submit"]').val();
		pwd = $('.loginval input[type="password"]').val();

		$('.preloadlogin').html('<img src="'+BaseUrl+'/adminpublic/images/elements/loaders/5s.gif" style="float: left; margin: 7px 0 0 10px;" alt="">');

		if(em == '' || pwd == '')
		{
			$('.preloadlogin img').remove();
			$('.loginval .error').text('Please give your email and password');
		}
		else
		{
			$.ajax({
				url:BaseUrl + "/admin/gologin",
				type:"post",
				data:$('.loginval').serialize(),
				success:function(data1){
					$('.preloadlogin img').remove();
					data = $.parseJSON(data1);
					if(data.login == 1)
						_Redirect(data.url);
					else
						$('.loginval .error').text('Account does not exist');
				}
			});
		}

		return false;
	});

	$('.forgpass1 input[type="submit"]').click(function(){
		em = $('.forgpass input[type="text"]').val();

		$('.preloadlogin').html('<img src="'+BaseUrl+'/adminpublic/images/elements/loaders/5s.gif" style="float: left; margin: 7px 0 0 10px;" alt="">');
		if(em != '')
		{
			$.ajax({
				url:BaseUrl+'/admin/forgpass',
				data:{email:em},
				type:"post",
				dataType:"html",
				success:function(data){
					$('.preloadlogin img').remove();
					alert(data);
				},
				error:function( jqXHR, textStatus, errorThrown){
					alert('ERROR: Something went wrong. Please try again later.\n'+errorThrown+'\n'+textStatus);
				}
			});
		}
		else
		{
			$('.preloadlogin img').remove();
			
		}
		return false;
	});
});
