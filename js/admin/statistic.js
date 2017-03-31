(function($){$(function(){
$('#stat_block').hide();
$('#style_select').hide();

$('#way_select').change(function(){
    var way=$('#way_select').val();
    if(way == 0){
        $('#stat_block').hide();
        $('#style_select').hide();
    }
    else{
        showStyles();
    } 
});

function showStyles(){
    $.ajax({
	url:'../ajax/selectStyles',
	type:'POST',
        data:'way='+$('#way_select').val(),
	success: function(data){
            $('#style_select').show();
            $('#style_select').html(data);
        }
    });
}

$('#style_select').change(function(){
    var style=$('#style_select').val();
    if(style == 0){
        $('#stat_block').hide();
    }
    else{
        $.ajax({
	url:'../ajax/showStat',
	type:'POST',
        data:'style='+style,
	success: function(data){
            $('#stat_block tbody').html(data);
            $('#stat_block').show();
        }
    });
    } 
});


})})(jQuery)