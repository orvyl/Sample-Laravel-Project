$(window).load(function() {
	// SUSTITUTE FOR CSS FIRST-AND LAST-CHILD
	$('.giftboxes-right-content li').last().css('background','none');
	$('.giftboxes-right-content li').last().css('padding-bottom',0);
	$('.giftboxes-right-content li').first().css('padding-top',0);
	$('.gifts-form li').last().css('margin-bottom',0);

	$.backstretch([BaseUrl+"/images/page_template/bg.jpg"]);
	
	// PAGE LOADING
	$(".loading").fadeOut(function(){
		setTimeout(function(){$(".loading").remove(); },2000);
		$('body').removeClass('hide');
	});
	
	// MENU MOBILE 
	//$('.mobile-view-home li').click(function(){
	//	$('.bottom-tab-content',this).slideToggle();
	//});
	
	$('.mobile-view-home p').click(function(){
		$(this).toggleClass('bullet');
		$($(this).parent().children()[2]).slideToggle();
	});
	
	
	//$('.help-home p').click(function(){
	//	$('.bottom-tab-content',this).toggleClass(),
	//	$(this).addClass('help-bg');
	//});
	
	$('.help-home p').click(function(){
		$(this).toggleClass('help-bg');
		$($(this).parent().children()[1]).slideToggle();
	});
	
	$('.menu-mobile li').click(function(){
		$('.sub-menu').slideToggle();
	});
	
	// MENU
	$('.menu li').mouseenter(function() {
		$('.menu-sub',this).slideDown();
	});
	
	$('.menu li').mouseleave(function() {
		$('.menu-sub',this).stop(true,true).slideUp();
	});
	
	// GIFT BOXES TAB
	$('.click-tab').click(function() {
		$(this).toggleClass('hide-tab');
		$($(this).parent().children()[1]).slideToggle(); 
	});
	
	$('.refine-selected li').click(function() {
		$(this).slideUp();
	});
	
	// PRODUCT DETAILS TAB
	$('.product-tab-select li').click(function() {
		$('li').removeClass('active');
		$(this).addClass('active');
	});
	
	$('#product1').click(function() {
		$('.product-out').slideUp();
		$('.product-tab-content1').slideDown();
	});
	$('#product2').click(function() {
		$('.product-tab-content2').slideDown();
		$('.product-tab-content1').slideUp();
	});

	//birthday
	$('.birthday-container li').click(function(){
		$('ul',this).slideToggle();
	});
	
// $('#product1').click(function() {
// 		$('.product-2-new').slideUp();
// 		$('.product-1-new').slideDown();
// 	});
// 	$('#product2').click(function() {
// 		$('.product-2-new').slideDown();
// 		$('.product-1-new').slideUp();
// 	});
	
	$('.map li').mouseenter(function(){
		$('.hover-tag-map span',this).fadeIn();
	});
	
	$('.map li').mouseleave(function(){
		$('.hover-tag-map span').stop(true,true).fadeOut();
	});
	
	//BLOG
	
	$('.blog-link li').click(function(){
		$('ul',this).slideToggle();
	});
	
	// SELEXT BOX
	$("#gift-1 , #gift-2 , #gift-3 , #gift-4 , #gift-5, #payment-1, #payment-2, #payment-3, #payment-4").msDropDown();
	$("#acct-1, #acct-2, #acct-3, #acct-4, #acct-5, #acct-6, #acct-7, #acct-8, #acct-9, #acct-10, #acct-11, #acct-12, #acct-13,#acct-14").msDropDown({mainCSS:'dd2'});

	/*Datepicker*/
    $( "#datepicker" ).datepicker({
		changeMonth: true,
		changeYear: true,
		showAnim: 'drop',
		yearRange: "-100:+0"
    });

    $('#dt1').datepicker();

    $(".valid_price").keydown(function(e){
	    var key = e.which;

	    // backspace, tab, left arrow, up arrow, right arrow, down arrow, delete, numpad decimal pt, period, enter
	    if (key != 8 && key != 9 && key != 37 && key != 38 && key != 39 && key != 40 && key != 46 && key != 110 && key != 190 && key != 13){
	        if (key < 48){
	            e.preventDefault();
	        }
	        else if (key > 57 && key < 96){
	            e.preventDefault();
	        }
	        else if (key > 105) {
	            e.preventDefault();
	        }
	    }
	});
});

function Animate2id(id2Animate){
	var animSpeed=1500; //animation speed
	var easeType="easeInOutExpo"; //easing type
	if($.browser.webkit){ //webkit browsers do not support animate-html
		$("body").stop().animate({scrollTop: $(id2Animate).offset().top}, animSpeed, easeType);
	} else {
		$("html").stop().animate({scrollTop: $(id2Animate).offset().top}, animSpeed, easeType);
	}
}