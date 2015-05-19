$(document).ready(function(){
	$('input[name="visit"]').click(function(){
		$(".visit_enable").attr('disabled', !this.checked);
	});
});