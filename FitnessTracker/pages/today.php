<script>
	$("document").ready(function(){
		$(".info-ticker").hide();

		$("#date-container").css({
			"position":"relative",
			"width":"95%",
			"height":"200px",
			"top":"25px",
			"background-color":"#000",
			"color":"#FFF",
			"border-radius":"5px",
			"margin":"auto"
		});

		$("#date-text").css({
			"position":"relative",
			"width":"97%",
			"height":"45%",
			"left":"1%",
			"top":"5px",
			"text-align":"center",
			"position":"relative",
			"background-color":"#FFF",
			"color":"#000",
			"padding":"5px",
			"border-radius":"5px",
		});
	});
</script>
<div>
	<div id="date-container">
		<div id="date-text">31 AUG 2015</div>
		<br>
		<div class="info-ticker" id="info-ticker-0">Location: Medina Gym</div>
		<div class="info-ticker" id="info-ticker-1">Temperature: 94° F</div>
	</div>

</div>