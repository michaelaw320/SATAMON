$( document ).ready(function() {
	"use strict";
	
	/*
		Get Value of URL Parameters using JavaScript -- Technical Overload
		http://www.technicaloverload.com/get-value-url-parameters-using-javascript/
	*/
	function getParameter(theParameter) { 
		var params = window.location.search.substr(1).split('&');
		for (var i = 0; i < params.length; i++) {
			var p = params[i].split('=');
			if (p[0] == theParameter) {
				return decodeURIComponent(p[1]);
			}
		}
		return false;
	}
	
	/* Creates a Bootstrap Alert component in #loginResponse */
	function loginResponse(type, title, message) {
		$( "#loginResponse" ).html(
			"<div class='alert alert-" + type + " alert-dismissible' role='alert'>\
				<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>\
				<strong>" + title + "</strong><br>" + message + "\
			 </div>");
	}
	
	$( "#loginForm" ).submit(function( e ) {
	
		var $form  = $( "#loginForm" ),
			action = $form.prop( "action" ),
			username = $form.find( "input[name='username']" ).val(),
			password = $form.find( "input[name='password']" ).val();
		
		$.post( action, {
			"username" : username,
			"password" : password
		})
		.done(function( data ) {
			if (data.LoginStatus === "SUCCESS") {
			
				loginResponse( "success",
					"Anda berhasil masuk ke dalam sistem.",
					"Anda akan dialihkan ke halaman tujuan Anda beberapa saat lagi."
				);
				
				// URL redirect
				var redir = getParameter("r");
				if (redir === false) {
					redir = "admin_home.php";
				}
				location.assign( redir );
				
			} else {
				loginResponse( "danger",
					"Maaf, terjadi kesalahan.",
					"Silahkan periksa kembali nama pengguna dan kata sandi yang Anda masukkan."
				);
			}
		})
		.fail(function( data ) {
			loginResponse( "warning",
				"Maaf, terjadi kesalahan.",
				"Silahkan mencoba kembali beberapa saat lagi."
			);
		});
		
		// cancel default event (form submit)
		return false;
	});
});