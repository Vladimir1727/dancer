(function($){$(function(){

$('#save_but').click(function(){
    $.ajax({
        url:'../../ajax/savePays',
        type:'POST',
        data:$('#pay_form').serialize(),
        success: function(data){
            show();
        }
    });
    return false;
});

function show(){
    $.ajax({
        url:'../../ajax/getCompListAdmin',
        type:'POST',
        data:'comp_id='+$('#comp_id').val(),
        success: function(data){
            $('#comp_list').html(data);
        }
    });
}

})})(jQuery)