<script src="js/jquery-1.11.2.js"></script>
<script src="js/jquery.downCount.js"></script>

<style>
	body {
		font-family: Arial, sans-serif;

	}


</style>

<div id="getting-started"></div>
<script type="text/javascript">
	$('#getting-started').countdown('2015/06/06', function(event) {
		$(this).html(event.strftime('%m months %d days %H:%M:%S'));
	});
</script>