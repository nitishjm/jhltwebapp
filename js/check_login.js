function _(id){
	return document.getElementById(id);
}

function validate_email(email){
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

function check_info(){
	
	_("login_btn").disabled = true;
	_("error_msg").setAttribute("class", "text-danger");
	
	var email = _("email").value;
	var pword = _("pword").value;
	
	if(email == ""){
		_("error_msg").innerHTML = "You cannot leave your email blank";
	}else if(pword == ""){
		_("error_msg").innerHTML = "You cannot leave your password blank";
	}else if(!validate_email(email)){
		_("error_msg").innerHTML = "That email is invalid, please try a different one.";
	}else{
		_("error_msg").setAttribute("class", "text-warning");
		_("error_msg").innerHTML = "Loading...";
		var formData = new FormData();
		formData.append('email', email);
		formData.append('pword', pword);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "database/login_user.php", true);
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
				if(xhr.responseText == "success"){
					_("login_form").reset();
					_("error_msg").setAttribute("class", "text-success");
					_("error_msg").innerHTML = "One moment please...";
					window.location.href = "my_log.php";
				}else{
					_("error_msg").setAttribute("class", "text-danger");
					_("error_msg").innerHTML = xhr.responseText;
				}
			}
		}
		xhr.send(formData);
	}
}