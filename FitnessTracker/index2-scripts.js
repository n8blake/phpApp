$(document).ready(function(){
	$("#today").click(function(){
		console.log(this.id);
		$("#content").load("index.php");
	});

	$("#attendance").click(function(){
		console.log(this.id);
		$("#content").load("attendance.php");
	});

	$("#settings").click(function(){
		console.log(this.id);
		$("#content").load("settings.php");
	});


});

	$("#LogIn").ready(function(){
		$("#LogIn").click(function(){
			console.log(this.id);
			$("#settings_view").text("Hey you!");
			});
		});

/*function showLogin() {

	console.log(this.id);
	$("#settings_view").load("login.php");

}*/