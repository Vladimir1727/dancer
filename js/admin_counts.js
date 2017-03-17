(function($){$(function(){

$('#savemodal').click(function(){
    var data=$('#formmodal').serializeArray();
    data[data.length]={name:'table',value:'cat_count'};
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
    data[data.length]={name:'table',value:'cat_count'};
    $.ajax({
        url:'../ajax/insert',
        type:'POST',
        data:data,
        success: function(data){
            $('#new_name').val('');
            $('#new_min').val('');
            $('#new_max').val('');
            show();
        }
    });
    return false;
});

addClick();

function addClick(){
    $('.edit').each(function(){//кнопка редактировать
	$(this).click(function(){
            var id=$(this).attr('id').substr(1);
            $.ajax({
		url:'../ajax/edit',
		type:'POST',
		data:'id='+id+'&table=cat_count',
		success: function(data){
                var modal=JSON.parse(data);
                    $('#edit_name').val(modal.name);
                    $('#edit_min').val(modal.min_count);
                    $('#edit_max').val(modal.max_count);
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
		data:'id='+id+'&table=cat_count',
		success: function(data){
                    show();
		}
            });
	});
    });
}

function show(){
    $.ajax({
	url:'../ajax/showCounts',
	type:'POST',
        success: function(data){
            $('#counts tbody').html(data);
            addClick();
        }
    });
}


})})(jQuery)