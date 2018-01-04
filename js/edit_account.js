function _(id){
	return document.getElementById(id);
} 

function update_names(){
	
	_("update_name").disabled = true;
	_("error_msg").setAttribute("class", "text-danger");
	
	var fname = _("fname").value;
	var lname = _("lname").value;
	
	if(fname == "" || lname == ""){
		_("error_msg").innerHTML = "You cannot leave any fields blank";
	}else if(fname.length > 15){
		_("error_msg").innerHTML = "Your first name is too long, please enter no more than 15 characters";
	}else if(lname.length > 15){
		_("error_msg").innerHTML = "Your last name is too long, please enter no more than 15 characters";
	}else{
		_("error_msg").setAttribute("class", "text-warning");
		_("error_msg").innerHTML = "Loading...";
		var formData = new FormData();
		formData.append('fname', fname);
		formData.append('lname', lname);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "database/update_account/update_name.php", true);
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					if(xhr.responseText == "success"){
						_("error_msg").setAttribute("class", "text-success");
						_("error_msg").innerHTML = "Your name was successfully updated";
						_("welcome_name").innerHTML = "&nbsp;&nbsp;Welcome "+fname+"!";
						_("account_name").innerHTML = fname+"&nbsp;"+lname;
						
					}else{
						_("error_msg").setAttribute("class", "text-danger");
						_("error_msg").innerHTML = xhr.responseText;
					}
				}
			}
		xhr.send(formData);
	}
}

function validate_email(email){
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}

function update_emails(){
	
	_("update_email").disabled = true;
	_("error_msg").setAttribute("class", "text-danger");
	
	var email = _("email").value;
	
	if(email == ""){
		_("error_msg2").innerHTML = "You cannot leave any fields blank";
	}else if(!validate_email(email)){
		_("error_msg2").innerHTML = "That email is invalid, please try a different one.";
	}else{
		_("error_msg2").setAttribute("class", "text-warning");
		_("error_msg2").innerHTML = "Loading...";
		var formData = new FormData();
		formData.append('email', email);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "database/update_account/update_email.php", true);
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					if(xhr.responseText == "success"){
						_("error_msg2").setAttribute("class", "text-success");
						_("error_msg2").innerHTML = "Your email was successfully updated";
						_("account_email").innerHTML = email;
					}else{
						_("error_msg2").setAttribute("class", "text-danger");
						_("error_msg2").innerHTML = xhr.responseText;
					}
				}
			}
		xhr.send(formData);
	}
}

function update_studentID(){
	
	_("update_studentnumber").disabled = true;
	_("error_msg3").setAttribute("class", "text-danger");
	
	var student_number = _("student_number").value;
	
	if(student_number = ""){
		_("error_msg3").innerHTML = "You cannot leave any fields blank";
	}else if(isNaN(student_number)){
		_("error_msg3").innerHTML = "Your student number is not a number";
	}else if(student_number < 0){
		_("error_msg3").innerHTML = "That is an invalid student number";
	}else if(student_number.toString().length != 6 && student_number.toString().length != 7){
		_("error_msg3").innerHTML = "Your student number must be either 6 or 7 digits";
	}else{
		_("error_msg3").setAttribute("class", "text-warning");
		_("error_msg3").innerHTML = "Loading...";
		var formData = new FormData();
		formData.append('student_number', student_number);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "database/update_account/update_student_number.php", true);
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					if(xhr.responseText == "success"){
						_("error_msg3").setAttribute("class", "text-success");
						_("error_msg3").innerHTML = "Your student number was successfully updated";
						_("account_number").innerHTML = student_number;
					}else{
						_("error_msg3").setAttribute("class", "text-danger");
						_("error_msg3").innerHTML = xhr.responseText;
					}
				}
			}
		xhr.send(formData);
	}
}

function validate_pass(pass){   
	var passw = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,20}$/;  
	return passw.test(pass);
}  

function update_password(){
	
	_("update_pword").disabled = true;
	_("error_msg4").setAttribute("class", "text-danger");
	
	var old_pass = _("old_pass").value;
	var new_pass = _("new_pass").value;
	var confirm_pass = _("confirm_new_pass").value;
	
	if(old_pass == "" || new_pass == "" || confirm_pass == ""){
		_("error_msg4").innerHTML = "You cannot leave any fields blank";
	}else if(!validate_pass(new_pass)){
		_("error_msg4").innerHTML = "Password must contain 6-20 characters, 1 capital letter, and 1 digit";
	}else if(new_pass != confirm_pass){
		_("password_form").reset();
		_("error_msg4").innerHTML = "Your passwords do not match! Please retype them";
	}else{
		_("error_msg4").setAttribute("class", "text-warning");
		_("error_msg4").innerHTML = "Loading...";
		var formData = new FormData();
		formData.append('old_pass', old_pass);
		formData.append('new_pass', new_pass);
		formData.append('confirm_pass', confirm_pass);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "database/update_account/update_password.php", true);
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					if(xhr.responseText == "success"){
						_("password_form").reset();
						_("error_msg4").setAttribute("class", "text-success");
						_("error_msg4").innerHTML = "Your password was successfully updated";
					}else{
						_("password_form").reset();
						_("error_msg4").setAttribute("class", "text-danger");
						_("error_msg4").innerHTML = xhr.responseText;
					}
				}
			}
		xhr.send(formData);
	}
}

function delete_account_total(){
	
	_("delete_acc").disabled = true;
	_("error_msg5").setAttribute("class", "text-danger");
	
	var current_pass = _("password").value;
	
	if(current_pass == ""){
		_("error_msg5").innerHTML = "You cannot leave any fields blank";
	}else{
		_("error_msg5").setAttribute("class", "text-warning");
		_("error_msg5").innerHTML = "Loading...";
		var formData = new FormData();
		formData.append('current_pass', current_pass);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "database/update_account/delete_account.php", true);
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					if(xhr.responseText == "success"){
						_("password_form").reset();
						window.location.replace("index.php");
					}else{
						_("password_form").reset();
						_("error_msg5").setAttribute("class", "text-danger");
						_("error_msg5").innerHTML = xhr.responseText;
					}
				}
			}
		xhr.send(formData);
	}
}