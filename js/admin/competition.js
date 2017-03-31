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

$('#reward_but').click(function(){
    $.ajax({
        url:'../../ajax/getCompReward',
        type:'POST',
        data:'comp_id='+$('#comp_id').val(),
        success: function(data){
            console.log(data);
            $('#reward_table tbody').html(data);
        }
    });
});

$('#done_but').click(function(){
    $.ajax({
        url:'../../ajax/doneComp',
        type:'POST',
        data:'comp_id='+$('#comp_id').val(),
        success: function(data){
            var mess='Соревнование ';
            var alert='alert ';
            $('#mess').removeClass();
            if (data=='OK'){
                mess+=' успешно закрыто. Все очки распределены';
                alert+='alert-success';
            }
            if (data=='ERROR'){
                mess+=' закрыто. Не все очки распределены (неправильные места)';
                alert+='alert-warning';
            }
            if (data=='NO'){
                mess+=' было закрыто ранее';
                alert+='alert-danger';
            }
            $('#mess').addClass(alert);
            $('#mess').text(mess);
        }
    });
});

})})(jQuery)