(function($){$(function(){

function show(){
    $.ajax({
        url:'../../ajax/getCompListAdmin2',
        type:'POST',
        data:'comp_id='+$('#comp_id').val(),
        success: function(data){
            $('#comp_list').html(data);
            add_click();
        }
    });
}

add_click();

function add_click(){
    $('#reward_but').click(function(){
        $.ajax({
            url:'../../ajax/getCompReward',
            type:'POST',
            data:'comp_id='+$('#comp_id').val(),
            success: function(data){
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

    $(".deldan").each(function(){
        $(this).click(function(){
            var part = $(this).attr("href");
            $.ajax({
                url:'../../ajax/delPart',
                type:'POST',
                data:'id='+part,
                success: function(){
                    show();
                }
            });
            return false;
        });
    });
}

})})(jQuery)