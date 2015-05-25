$(document).ready(function()
{

	var hoverInterval;
	var transitionTime = 3000;

	$("div#photos_container").hover(
		function()
		{
			onHover(this);

			var time = $(this).children().length * transitionTime;
			
			hoverInterval = window.setInterval(onHover, time, this);
			
		},
		function()
		{
			window.clearInterval(hoverInterval);
			$(this).children().finish();
		});

	function onHover(container)
	{

		$(container).children().each(function(index)
				{
					var $delayTime = transitionTime * index;
					$(this).fadeToggle(transitionTime);
						
					$next = $(this).next();

					if($next.length == 0)
					{
						$next = $(this).parent().children().first();
						$next.fadeToggle(transitionTime);
					}
					else
					{
						$next.delay($delayTime)
							.fadeToggle(transitionTime);
					}
				});

	}
});