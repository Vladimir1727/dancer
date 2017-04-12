(function($){$(function(){
$('#cities').hide();
$('#clubes').hide();
$('#trainers').hide();
$('#add').hide();

$('#region').change(function(){
	$('#cities').show();
	$.ajax({
		url:'../../ajax/getCitiesHtml',
		type:'POST',
		data:'region='+$('#region').val(),
		success: function(data){
			city(data);
		}
	})
});

function city(data){
	$('#city').html(data);
	$('#city').change(function(){
		$('#clubes').show();
		$.ajax({
			url:'../../ajax/getClubesHtml',
			type:'POST',
			data:'city='+$('#city').val(),
			success: function(clubes){
				$('#club').html(clubes);
				club(clubes);
			}
		})
	});
}

function club(data){
	$('#club').change(function(){
		$('#trainers').show();
		$.ajax({
			url:'../../ajax/getTrainersHtml',
			type:'POST',
			data:'club='+$('#club').val(),
			success: function(trainers){
				$('#trainer').html(trainers);
				$('#trainers').show();
                                $('#trainer').change(function(){
                                   if ($('#trainer').val()>0){
                                       $('#add').show();
                                   }
                                });
			}
		})
	});
}


$('#add').click(function(){
	var ver=verify([['club','num']]);
	return ver;
});

})})(jQuery)