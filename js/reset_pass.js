function _(id){
	return document.getElementById(id);
} 

function validate_email(email){
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

function validate_pass(pass){   
	var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;  
	return passw.test(pass);
}  

function send_email(){
	_("email_btn").disabled = true;
	_("error_msg").setAttribute("class", "text-danger");
	
	var email = _("email").value;
	
	if(email == ""){
		_("error_msg").innerHTML = "You cannot leave any fields blank";
	}else if(!validate_email(email)){
		_("error_msg").innerHTML = "That email is invalid, please try a different one.";
	}
	else{
		_("error_msg").setAttribute("class", "text-warning");
		_("error_msg").innerHTML = "Loading...";
		var formData = new FormData();
		formData.append('email', email);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "database/send_reset_email.php", true);
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					if(xhr.responseText == "success"){
						_("error_msg").setAttribute("class", "text-success");
						_("error_msg").innerHTML = "An email was sent to the address you entered.";
					}else{
						_("error_msg").setAttribute("class", "text-danger");
						_("error_msg").innerHTML = xhr.responseText;
					}
				}
			}
		xhr.send(formData);
	}
}

function reset_pass(id){
	_("reset_btn").disabled = true;
	_("error_msg").setAttribute("class", "text-danger");
	
	var new_pass = _("new_pass").value;
	var confirm_pass = _("confirm_pass").value;
	
	if(new_pass == "" || confirm_pass == ""){
		_("error_msg").innerHTML = "You cannot leave any fields blank";
	}else if(new_pass != confirm_pass){
		_("error_msg").innerHTML = "Your passwords do not match!";
	}else if(!validate_pass(new_pass)){
		_("error_msg").innerHTML = "Password must contain 6-20 characters, 1 capital letter, and 1 digit";
	}
	else{
		_("error_msg").setAttribute("class", "text-warning");
		_("error_msg").innerHTML = "Loading...";
		var formData = new FormData();
		formData.append('new_pass', new_pass);
		formData.append('confirm_pass', confirm_pass);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "database/update_account/reset_password.php?user_id="+id, true);
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					if(xhr.responseText == "success"){
						_("reset_form").reset();
						_("error_msg").setAttribute("class", "text-success");
						_("error_msg").innerHTML = "Your password was successfully reset. Hang on while we take you back to the home page...";
						 setTimeout(function () {window.location.href = "index.php"; }, 2000);
					}else{
						_("error_msg").setAttribute("class", "text-danger");
						_("error_msg").innerHTML = xhr.responseText;
					}
				}
			}
		xhr.send(formData);
	}
}