$( document ).ready(function() {
	"use strict";
	
	function loginResponse(type, title, message) {
		$( "#loginResponse" ).html(
			"<div class='alert alert-" + type + " alert-dismissible' role='alert'>\
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>\
				<strong>" + title + "</strong> " + message + "\
			 </div>");
	}
	
	$( "#loginForm" ).submit(function( e ) {
	
		var	$form = $( this ),
			username = $form.find( "input[name='username']" ).val(),
			password = $form.find( "input[name='password']" ).val(),
			action = $form.prop( "action" );
		
		$.post( action, {
			"username" : username,
			"password" : password
		})
		.done(function( data ) {
			// TODO add done
			loginResponse( "success", "Done!", "Done loh." );
		})
		.fail(function( data ) {
			// TODO add fail
			loginResponse( "danger", "Fail!", "Fail leh." );
		});
		
		e.preventDefault();
	});
});