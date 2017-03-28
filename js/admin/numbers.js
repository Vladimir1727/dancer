(function($){$(function(){

$('#calc').click(function(){
    $.ajax({
        url:'../../ajax/setNumbers',
        type:'POST',
        data:'comp_id='+$('#comp_id').val(),
        success: function(data){
            show();
        }
    });
    return false;
});

function show(){
    $.ajax({
        url:'../../ajax/getNumbers',
        type:'POST',
        data:'comp_id='+$('#comp_id').val(),
        success: function(data){
            var data=JSON.parse(data);
            $('#solo_list').html(data.solo);
            $('#group_list').html(data.group);
        }
    });
}

})})(jQuery)