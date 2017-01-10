function PopupCenter(url, title, w, h) {
	// Fixes dual-screen position                         Most browsers      Firefox
	var dualScreenLeft = window.screenLeft != undefined ? window.screenLeft : screen.left;
	var dualScreenTop = window.screenTop != undefined ? window.screenTop : screen.top;

	var width = window.innerWidth ? window.innerWidth : document.documentElement.clientWidth ? document.documentElement.clientWidth : screen.width;
	var height = window.innerHeight ? window.innerHeight : document.documentElement.clientHeight ? document.documentElement.clientHeight : screen.height;

	var left = ((width / 2) - (w / 2)) + dualScreenLeft;
	var top = ((height / 2) - (h / 2)) + dualScreenTop;
	var newWindow = window.open(url, title, 'scrollbars=yes, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);

	// Puts focus on the newWindow
	if (window.focus) {
		newWindow.focus();
	}
}

function showAnimation(element, animation, times) {
	$(element).addClass('animated ' + animation);
	window.setTimeout(function() {
		$(element).removeClass('animated ' + animation);
	}, times);
}


$('#submitSignIn').on('click', function() {
	var hasErrors = $('form[name="signin"]').validator('validate').has('.has-error').length
	if (hasErrors == 1) {
		showAnimation("#signin", "rubberBand", 2000);
	} else {
		signIn();
	}
});

function signIn() {
	var emails = $("#signInEmail").val();
	var passwords = $("#signInPassword").val();
	$.post('../oauth/infinity/signin/index.php', {
		email: emails,
		pass: passwords
	}, function(data) {
		if (data == 'passed') {
            $("#errorSignIn").hide();
			showAnimation("#signin", "tada", 2000); 
			$("#signin").html('<div class = "alert alert-success">Signed In Successful - Please Wait <i class="fa fa-refresh fa-spin" style="font-size:12px"></i></div>');
			setTimeout(function(){
					 window.location.href = "http://1nfinityinc.cf/home";
			}, 2000);
		} else {
			$("#errorSignIn").html('<div class = "alert alert-danger alert-dismissable"><button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>' + data + '</div>');
			showAnimation("#errorSignIn", "rubberBand", 2000);	
		}
	});
}

$('#submitSignUp').on('click', function() {
	var hasErrors = $('form[name="signup"]').validator('validate').has('.has-error').length
	if (hasErrors == 1) {
		showAnimation("#signup", "shake", 2000); //rubberBand
	} else {
		signUp();
	}
});

function signUp() {
	var names = $("#signUpName").val();
	var emails = $("#signUpEmail").val();
	var passwords = $("#signUpPassword").val();
	var c_passwords = $("#signUpPassword").val();
	$.post('../oauth/infinity/signup/index.php', {
		name: names,
		email: emails,
		pass: passwords,
		confirm: c_passwords,
	}, function(data) {
			console.log(data);
		if (data == 'passed') {
      $("#errorSignUp").hide();
			showAnimation("#signup", "tada", 2000); 
			$("#signup").html('<div class = "alert alert-success">Thanks for signing up! You can login now! </div>');
		} else {
			$("#errorSignUp").html('<div class = "alert alert-danger alert-dismissable"><button type = "button" class = "close" data-dismiss = "alert" aria-hidden = "true">&times;</button>' + data + '</div>');
			showAnimation("#errorSignUp", "rubberBand", 2000);	
		}
	});
}
