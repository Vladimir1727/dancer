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
    data[data.length]={name:'table',value:'show_ligs'};
    $.ajax({
        url:'../ajax/insert',
        type:'POST',
        data:data,
        success: function(data){
            show();
        }
    });
    return false;
});

function addClick(){
    $('.del').each(function(){//кнопка удалить
	    $(this).click(function(){
            var id=$(this).attr('id').substr(1);
            $.ajax({
   		        url:'../ajax/delete',
		        type:'POST',
		        data:'id='+id+'&table=show_ligs&soft=0',
		        success: function(data){
					console.log(data);
                show();
		        }
            });
			
	    });
    });
}

function show(){
	$.ajax({
	url:'../ajax/showAgeLig',
	type:'POST',
        data:'way='+$('#way_id').val(),
        success: function(data){
            $('#agelig_table tbody').html(data);
           addClick();
        }
    });
        var way_id=$('#way_id').val();
	$.ajax({
	url:'../ajax/selectLigs',
	type:'POST',
        data:'way_id='+way_id,
        success: function(data){
            $('#lig_id').html(data);
            
        }
    });
}


})})(jQuery)