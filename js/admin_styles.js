(function($){$(function(){
console.log('start');
$('#style_block').hide();

$('#way_select').change(function(){
    var way=$('#way_select').val();
    $('#way_id').val(way);
    if(way == 0){
        $('#style_block').hide();
    }
    else{
        showStyles();
        $('#style_block').show();
    } 
});

$('#savemodal').click(function(){
    var data=$('#formmodal').serializeArray();
    data[data.length]={name:'table',value:'styles'};
    $.ajax({
        url:'../ajax/save',
        type:'POST',
        data:data,
        success: function(data){
            console.log(data);
            showStyles();
        }
    });
});

$('#new_but').click(function(){
    var data=$('#add_form').serializeArray();
    data[data.length]={name:'table',value:'styles'};
    $.ajax({
        url:'../ajax/insert',
        type:'POST',
        data:data,
        success: function(data){
            $('#new').val('');
            showStyles();
        }
    });
    return false;
});

function addClick(){
    $('.edit').each(function(){//кнопка редактировать путь
	$(this).click(function(){
            var id=$(this).attr('id').substr(1);
            $.ajax({
		url:'../ajax/edit',
		type:'POST',
		data:'id='+id+'&table=styles',
		success: function(data){
                    var style=JSON.parse(data);
                    $('#modalval').val(style.style);
                    $('#id').val(style.id);
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
		data:'id='+id+'&table=styles',
		success: function(data){
                    showStyles();
		}
            });
	});
    });
}

function showStyles(){
    $.ajax({
	url:'../ajax/showStyles',
	type:'POST',
        data:'way='+$('#way_id').val(),
	success: function(data){
            $('#style_table tbody').html(data);
            addClick();
        }
    });
}


})})(jQuery)