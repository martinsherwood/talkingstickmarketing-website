/* 
   admin.js - Contains the jQuery functions for the admin section of the website
   Author: Martin Sherwood
*/


//Alert shown if login details are incorrect
//****************************************************************************
$(function(showAlert) {
	$('h4.alert').hide().fadeIn(700);
	$('<span class="close"></span>').appendTo('h4.alert');
	
	$('span.close').click(function() {
		$(this).parent('h4.alert').fadeOut('slow');						   
	});
});

//toggle for showing and hiding password on the login form
//****************************************************************************
$(function(showPassword){
	$(".show-password").each(function(index,input) {
		var $input = $(input);
		$("<p class='show-password'/>").append(
			$("<input type='checkbox' id='show-password' />").click(function() {
				var change = $(this).is(":checked") ? "text" : "password";
				var rep = $("<input placeholder='Password' type='" + change + "' />")
					.attr("id", $input.attr("id"))
					.attr("name", $input.attr("name"))
					.attr('class', $input.attr('class'))
					.val($input.val())
					.insertBefore($input);
				$input.remove();
				$input = rep;
			 })
		).append($("<label for='showpassword'/>").text("Show Password")).insertAfter($input.parent()); //places the checkbox field
	});
	
	//change the icon from locked to unlocked while password is shown 
	$('#show-password').click(function(){
		if($("#show-password").is(":checked")) {
			$('.icon-lock').addClass('icon-unlock');
			$('.icon-unlock').removeClass('icon-lock');    
		} else {
			$('.icon-unlock').addClass('icon-lock');
			$('.icon-lock').removeClass('icon-unlock');
		}
	});
});

//Fallback validation if browser doesn't support the required attribute
//****************************************************************************
$(function(validateForm){
	var forms = $('.login-form'), //set variables
		formsCount = forms.length,
		items = forms.find('input[required]'),
		count = items.length;
	//check for required browser support
	if (Modernizr.input.required) {

	} else {
			
		//loop though each required input and set the class jQuery validate needs
		for (var i = 0; i < count; i += 1) {
			var obj = items[i];
			$(obj).attr('class', 'required ' + obj.getAttribute('type')).removeAttr('required');
		};
		
		Modernizr.load({ //load plugin only if needed
			test: Modernizr.input.required,
			nope: '//cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.11.0/jquery.validate.min.js', //or local, ../js/vendor/jquery.validate.min.js
			complete: function(){
				//call function
				for (var i = 0; i < formsCount; i += 1) {
					$(forms[i]).validate(); //validate the form
				}
			}
		});
	} //if required supported
});



