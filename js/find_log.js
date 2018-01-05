function _(id){
	return document.getElementById(id);
}

function find_log(){
	
	_("find_btn").disabled = true;
	_("error_msg").setAttribute("class", "text-danger");
	
	var student_number = _("student_id").value;
	
	if(student_number == ""){
		_("error_msg").innerHTML = "You cannot leave any fields blank";
	}else{
		window.location.href = "found_log.php?student_number="+student_number;
	}
	
}