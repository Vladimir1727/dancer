(function($){$(function(){

function show(){
    $.ajax({
        url:'../../ajax/getCompListTrainer',
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