function _(id){
	return document.getElementById(id);
} 

function check_info(){
	_("add_btn").disabled = true;
	_("error_msg").setAttribute("class", "text-danger");
	
	var event_name = _("event_name").value;
	var event_desc = _("event_desc").value;
	var coordinated = -1;
	if(_("yes").checked){
		coordinated = 1;
	}else if(_("no").checked){
		coordinated = 0;
	}
	var hours = _("hours").value;
	var minutes = _("minutes").value;
	var date = _("date").value;
	
	if(event_name == "" || event_desc == "" || coordinated == -1 || hours == "" || minutes == "" || date == ""){
		_("error_msg").innerHTML = "You cannot leave any fields blank";
	}else if(hours < 0 && hours > 99){
		_("error_msg").innerHTML = "You can only log hours between 0-99";
	}else if(minutes < 0 && minutes > 59){
		_("error_msg").innerHTML = "You can only log minutes between 0-59";
	}else if(hours == 0 && minutes == 0){
		_("error_msg").innerHTML = "You cannot enter an entry that has no time";
	}else if(event_desc.length < 30){
		_("error_msg").innerHTML = "Your description is too short, please write at least 30 characters";
	}
	else{
		_("error_msg").setAttribute("class", "text-warning");
		_("error_msg").innerHTML = "Loading...";
		var formData = new FormData();
		formData.append('event_name', event_name);
		formData.append('event_desc', event_desc);
		formData.append('coordinated', coordinated);
		formData.append('hours', hours);
		formData.append('minutes', minutes);
		formData.append('date', date);
		var xhr = new XMLHttpRequest();
		xhr.open("POST", "database/add_entry.php", true);
			xhr.onreadystatechange = function(){
				if(xhr.readyState == 4 && xhr.status == 200){
					if(xhr.responseText == "success"){
						_("add_form").reset();
						_("error_msg").setAttribute("class", "text-success");
						_("error_msg").innerHTML = "You have successfully added an entry!";
					}else{
						_("error_msg").setAttribute("class", "text-danger");
						_("error_msg").innerHTML = xhr.responseText;
					}
				}
			}
		xhr.send(formData);
	}
}	