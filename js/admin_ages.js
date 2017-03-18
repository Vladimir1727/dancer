(function($){$(function(){

$('#savemodal').click(function(){
    var data=$('#formmodal').serializeArray();
    data[data.length]={name:'table',value:'cat_age'};
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
    data[data.length]={name:'table',value:'cat_age'};
    $.ajax({
        url:'../ajax/insert',
        type:'POST',
        data:data,
        success: function(data){
            $('#new_name').val('');
            $('#new_min').val('');
            $('#new_max').val('');
            $('#new_count').val(0);
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
		data:'id='+id+'&table=cat_age',
		success: function(data){
                var modal=JSON.parse(data);
                    $('#edit_name').val(modal.name);
                    $('#edit_min').val(modal.min_age);
                    $('#edit_max').val(modal.max_age);
                    $('#edit_count option').each(function(){
                        if ($(this).val()==modal.dancers_count){
                            $(this).attr('selected','selected');
                        }else{
                            $(this).removeAttr('selected');
                        }
                    });
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
		data:'id='+id+'&table=cat_age',
		success: function(data){
                    show();
		}
            });
	});
    });
}

function show(){
    $.ajax({
	url:'../ajax/showAges',
	type:'POST',
        success: function(data){
            $('#list tbody').html(data);
            addClick();
        }
    });
}


})})(jQuery)