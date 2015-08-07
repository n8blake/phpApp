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

		var c = $("#nav").children();
		var q1  = w * .25;
		var q2 = w * .5;
		var q3 = w * .75;
		$("#today").css({"left" : "0"});
		$("#attendance").css({"left" : q1});
		$("#stats").css({"left" : q2});
		$("#settings").css({"left" : q3});
		console.log(c[0]);

	}

	console.log(w);

	//	$("#primary-style").

	$("#today").click(function(){
		$("#content").load("pages/today.php");
	});

	$("#attendance").click(function(){
		$("#content").load("pages/attendance.php");
	});

	$("#stats").click(function(){
		$("#content").load("pages/stats.php");
	});

	$("#settings").click(function(){
		$("#content").load("pages/settings.php");
	});


});