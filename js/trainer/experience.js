(function($){$(function(){

addClick();

$('#savemodal').click(function(){
    var data=$('#formmodal').serializeArray();
    $.ajax({
        url:'../../ajax/saveExp',
        type:'POST',
        data:data,
        success: function(data){
            console.log(data);
            show();
        }
    });
});

function addClick(){
    $('.add_exp').each(function(){//кнопка добавить
	$(this).click(function(){
            var way_id=$(this).attr('id').substr(1);
            $('#way_id').val(way_id);
            $('#dancer_name').text($('#name').text());
            $('#way').text($(this).parent().parent().find('td:first-child').text());
            $.ajax({
		url:'../../ajax/selectLigs',
		type:'POST',
		data:'way_id='+way_id,
		success: function(data){
                $('#lig_id').html(data);
		}
            });
	});
    });
  
}

function show(){
    $.ajax({
	url:'../../ajax/showExp',
	type:'POST',
        data:'id='+$('#dancer_id').val(),
        success: function(data){
            $('#main_table').html(data);
            addClick();
        }
    });
}

})})(jQuery)