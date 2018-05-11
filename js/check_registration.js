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

function check_info(){
	
	_("register_btn").disabled = true;
	_("error_msg").setAttribute("class", "text-danger");
	
	var email = _("email").value;
	var fname = _("fname").value;
	var lname = _("lname").value;
	var student_id = _("student_id").value;
	var grade = _("grade").value;
	var pword = _("pword").value;
	var cpword = _("cpword").value;
	
	if(email == "" || fname == "" || lname == "" || student_id == "" || grade == "" || pword == "" || cpword == ""){
		_("error_msg").innerHTML = "You cannot leave any fields blank";
	}else if(isNaN(student_id)){
		_("error_msg").innerHTML = "Your student number is not a number";
	}else if(student_id < 0){
		_("error_msg").innerHTML = "That is an invalid student number";
	}else if(student_id.toString().length != 6 && student_id.toString().length != 7){
		_("error_msg").innerHTML = "Your student number must be either 6 or 7 digits";
	}else if(grade != 10 && grade != 11 && grade != 12){
		_("error_msg").innerHTML = "You must be in grade 10 to 12";
	}else if(pword != cpword){
		_("pword").value = "";
		_("cpword").value = "";
		_("error_msg").innerHTML = "Your passwords do not match! Please retype them";
	}else if(!validate_email(email)){
		_("error_msg").innerHTML = "That email is invalid, please try a different one.";
	}else if(fname.length > 15){
		_("error_msg").innerHTML = "Your first name is too long, please enter no more than 15 characters";
	}else if(lname.length > 15){
		_("error_msg").innerHTML = "Your last name is too long, please enter no more than 15 characters";
	}else if(!validate_pass(pword)){
		_("error_msg").innerHTML = "Password must contain 6-20 characters, 1 capital letter, and 1 digit";
	}
	else{
		_("error_msg").setAttribute("class", "text-warning");
		_("error_msg").innerHTML = "Loading...";
		var formData = new FormData();
		formData.append('email', email);
		formData.append('fname', fname);
		formData.append('lname', lname);
		formData.append('student_id', student_id);
		formData.append('grade', grade);
		formData.append('pword', pword);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "database/register_user.php", true);
		xhr.onreadystatechange = function(){
			if(xhr.readyState == 4 && xhr.status == 200){
				if(xhr.responseText == "success"){
					_("register_form").reset();
					_("error_msg").setAttribute("class", "text-success");
					_("error_msg").innerHTML = "You have successfully registered! Hold on a second while we take you back to the login page...";
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