$("document").ready(function(){

	var w = $(window).width();
	var h = $(window).height();

	setSize(h, w);

	$( window ).resize(function() {
		w = $(window).width();
		h = $(window).height();
		console.log("w " + w);
		console.log("h " + h);
		setSize(h, w);
	});

	function setSize(h, w){

	if (h < w){
			$("#primary-style").html("<link rel='stylesheet' type='text/css' href='layout-styles-wide.css'>");
		} else {
			$("#primary-style").html("<link rel='stylesheet' type='text/css' href='layout-styles.css'>");
		}
	}

	console.log(w);

	//	$("#primary-style").

	$("#today").click(function(){
		$("#content").load("pages/today.html");
	});

	$("#attendance").click(function(){
		$("#content").load("pages/attendance.html");
	});

	$("#stats").click(function(){
		$("#content").load("pages/stats.html");
	});

	$("#settings").click(function(){
		$("#content").load("pages/settings.html");
	});


});