(function($){$(function(){
$('#cities').hide();
$('#clubes').hide();

$('#region').change(function(){
	$('#cities').show();
	$.ajax({
		url:'../../ajax/getCitiesHtml',
		type:'POST',
		data:'region='+$('#region').val(),
		success: function(data){
			$('#city').html(data);
			$('#city').change(function(){
				$('#clubes').show();
				$.ajax({
					url:'../../ajax/getClubesHtml',
					type:'POST',
					data:'city='+$('#city').val(),
					success: function(clubes){
						$('#club').html(clubes);
					}
				})
			});
		}
	})
});




$('#add').click(function(){
	var ver=verify([['club','num']]);
	return ver;
});

})})(jQuery)