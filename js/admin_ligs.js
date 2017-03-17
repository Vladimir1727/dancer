(function($){$(function(){

$('#ligs_block').hide();

$('#way_select').change(function(){
    var way=$('#way_select').val();
    $('#way_id').val(way);
    if(way == 0){
        $('#ligs_block').hide();
    }
    else{
        show();
        $('#ligs_block').show();
    }
});


$('#savemodal').click(function(){
    var data=$('#formmodal').serializeArray();
    data[data.length]={name:'table',value:'ligs'};
    $.ajax({
        url:'../ajax/save',
        type:'POST',
        data:data,
        success: function(data){
             show();
        }
    });
});

$('#new_but').click(function(){
    var data=$('#add_form').serializeArray();
    data[data.length]={name:'table',value:'ligs'};
    $.ajax({
        url:'../ajax/insert',
        type:'POST',
        data:data,
        success: function(data){
            $('#new_name').val('');
            $('#new_points').val('');
            $('#new_days').val('');
            $('#new_days').val('');
            $('#new_number').val('');
            show();
        }
    });
    return false;
});

function addClick(){
    $('.edit').each(function(){//кнопка редактировать
	$(this).click(function(){
            var id=$(this).attr('id').substr(1);
            $.ajax({
		url:'../ajax/edit',
		type:'POST',
		data:'id='+id+'&table=ligs',
		success: function(data){
                var modal=JSON.parse(data);
                    $('#edit_name').val(modal.name);
                    $('#edit_number').val(modal.number);
                    $('#edit_points').val(modal.points);
                    $('#edit_days').val(modal.days);
                    $('#id').val(modal.id);
		}
            });
	});
    });
    
    $('.del').each(function(){//кнопка удалить
	$(this).click(function(){
            var id=$(this).attr('id').substr(1);
            $.ajax({
		url:'../ajax/delete',
		type:'POST',
		data:'id='+id+'&table=ligs',
		success: function(data){
                    show();
		}
            });
	});
    });
}

function show(){
    $.ajax({
	url:'../ajax/showLigs',
	type:'POST',
        data:'way='+$('#way_id').val(),
        success: function(data){
            $('#ligs tbody').html(data);
            addClick();
        }
    });
}


})})(jQuery)