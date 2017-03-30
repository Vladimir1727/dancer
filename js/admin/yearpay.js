(function($){$(function(){

$('#all_but').click(function(){
    console.log('all');
    show('all');
});

$('#yes_but').click(function(){
    console.log('yes');
    show('yes');
});

$('#no_but').click(function(){
    console.log('no');
    show('no');
});

function show(type){
    $.ajax({
        url:'../ajax/getYearPay',
        type:'POST',
        data:'type='+type,
        success: function(data){
            $('#main_table tbody').html(data);
        }
    });
}

$('#save_but').click(function(){
    $.ajax({
        url:'../ajax/saveYearPays',
        type:'POST',
        data:$('#pay_form').serialize(),
        success: function(data){
            show('all');
        }
    });
});

})})(jQuery)