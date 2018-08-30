$(document).ready(function(){
	if (!localStorage.getItem('login-token')) {
        window.location.href = 'http://' + window.location.hostname;
	}
	
	showProfile();
	/* This code is executed after the DOM has been completely loaded */

	/* Changing thedefault easing effect - will affect the slideUp/slideDown methods: */
	$.easing.def = "easeOutBounce";

	/* Binding a click event handler to the links: */
	$('li.button a').click(function(e){
	
		/* Finding the drop down list that corresponds to the current section: */
		var dropDown = $(this).parent().next();
		
		/* Closing all other drop down sections, except the current one */
		$('.dropdown').not(dropDown).slideUp('slow');
		dropDown.slideToggle('slow');
		
		/* Preventing the default event (which would be to navigate the browser to the link's address) */
		e.preventDefault();
	})
	
});

function showProfile() {
	var userProfile = JSON.parse(localStorage.getItem('user'));
	var role;
	if (userProfile.role === 1) {
		role = "Admin";
	} else {
		role = "User";
	}
	$('.teddy-text h4').text(userProfile.full_name);
	$('.teddy-text p').text(role);
	$('#name').text(userProfile.full_name);
	$('#email').text(userProfile.email);
	$('#phone').text(userProfile.phone);
	$('#address').text(userProfile.address);
}
  