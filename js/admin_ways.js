(function($){$(function(){

$('#savemodal').click(function(){
    var data=$('#formmodal').serializeArray();
    data[data.length]={name:'table',value:'ways'};
    $.ajax({
        url:'../ajax/save',
        type:'POST',
        data:data,
        success: function(data){
            showWays();
        }
    });
});

addClick();

function addClick(){
    $('.edit').each(function(){//кнопка редактировать путь
	$(this).click(function(){
            var id=$(this).attr('id').substr(1);
            $.ajax({
		url:'../ajax/edit',
		type:'POST',
		data:'id='+id+'&table=ways',
		success: function(data){
                    var way=JSON.parse(data);
                    $('#modalval').val(way.way);
                    $('#id').val(way.id);
		}
            });
	});
    });
    
    $('.del').each(function(){//кнопка удалить путь
	$(this).click(function(){
            var id=$(this).attr('id').substr(1);
            $.ajax({
		url:'../ajax/delete',
		type:'POST',
		data:'id='+id+'&table=ways',
		success: function(data){
                    showWays();
		}
            });
	});
    });
}

function showWays(){
    $.ajax({
	url:'../ajax/showWays',
	type:'POST',
	success: function(data){
            $('#ways tbody').html(data);
            addClick();
        }
    });
}


})})(jQuery)