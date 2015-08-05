function update_user_attendance(username){
	
	var hashtag = "#";
	//console.log(hashtag);
	var attend = username;
	//console.log(attend);
	var hashtag_attend = hashtag.concat(attend);
	//console.log(hashtag_attend);
	var current_user = document.getElementById("current_user").innerHTML;
	var date_string = get_date_string();

	var attend_bool = $(hashtag_attend).is(':checked');

	if (attend_bool == true){
		attend_bool = 1;
	} else {
		attend_bool = 0;
	}

	document.getElementById("response_div").innerHTML = "Script Success!";
	//console.log(attend_bool);

	//var str = username.concat(", "+attend_bool);
	
	var json = '{"username":"' + username + '","presence":"' + attend_bool + '","date":"'+ date_string +'","editing_user":"'+ current_user +'"}';

	console.log(json);

	$.post("verify_user.php", current_user, function(data, status){
			document.getElementById("valid_user").innerHTML = "<span class='console_message'>" + "\nCurrent User verification Data: " + data + "\nStatus: " + status + "</span>";
		}

		);

	$.post("update_attendance.php", json, 
		
		function(data,status){ 
			document.getElementById("ajax_resonse").innerHTML = "<span class='console_message'>" + "\nUpdate Attendance record Data: " + data + "\nStatus: " + status + "</span>";
		} 
	);
  

}

function get_date_string(){

	var ds = document.getElementById("date_string").innerHTML;
	//ds = ds.toString();
	return ds;
}