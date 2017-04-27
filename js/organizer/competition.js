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

$('#close_but').click(function(){
    $.ajax({
        url:'../../ajax/closeComp',
        type:'POST',
        data:'comp_id='+$('#comp_id').val(),
        success: function(data){
            console.log(data);
            var mess='регистрация закрыта';
            var alert='alert alert-warning';
            $('#mess').addClass(alert);
            $('#mess').text(mess);
        }
    });
});

add_click();

function add_click(){
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