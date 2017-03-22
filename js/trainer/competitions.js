(function($){$(function(){
addClick();


function addClick(){
    $('.info').each(function(){//кнопка информация
	$(this).click(function(){
            var id=$(this).attr('id').substr(1);
            $.ajax({
		url:'../ajax/compInfo',
		type:'POST',
		data:'id='+id,
		success: function(data){
                    var modal = JSON.parse(data);
                    $('#i_name').text(modal.name);
                    $('#i_city').text(modal.city);
                    $('#i_comment').text(modal.comment);
                    $('#i_way').text(modal.way);
                    $('#i_org').text(modal.last_name+' '+modal.first_name+' '+modal.father_name);
                    $('#i_contact').text(modal.email+' '+modal.phone);
                    $('#i_reg').text('с '+modal.date_reg_open+' по '+modal.date_reg_close);
                    $('#i_date').text('с '+modal.date_open+' по '+modal.date_close);
                    $('#i_status').text(modal.status);
		}
            });
	});
    });
}

function show(){
    $.ajax({
	url:'../ajax/showCompetitions',
	type:'POST',
        data:'role=trainer',
        success: function(data){
            $('#main_table tbody').html(data);
            addClick();
        }
    });
}


})})(jQuery)