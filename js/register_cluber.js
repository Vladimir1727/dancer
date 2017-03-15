(function($){$(function(){
$('#cities').hide();

$('#region').change(function(){
	$('#cities').show();
	$.ajax({
		url:'../../ajax/getCitiesHtml',
		type:'POST',
		data:'region='+$('#region').val(),
		success: function(data){
			$('#city').html(data);
		}
	})
});

$('#add').click(function(){
	var ver=verify([['city','num'],['region','num'],['name','name']]);
	return ver;
});

})})(jQuery)