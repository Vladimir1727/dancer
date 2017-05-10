(function($){$(function(){

$('#all_but').click(function(){
    console.log('all');
    show('all',1);
});

$('#yes_but').click(function(){
    console.log('yes');
    show('yes',1);
});

$('#no_but').click(function(){
    console.log('no');
    show('no',1);
});

function show(type, page){
    var col=20;
    $.ajax({
        url:'../ajax/getYearPay2',
        type:'POST',
        data:'type='+type+'&col='+col+'&page='+page,
        success: function(data){
            var res=JSON.parse(data);
            $('#main_table tbody').html(res.list);
            $('#pagg').html(res.pagg);
            $('#next').click(function(){show(type, page+1)});
            $('#prev').click(function(){show(type, page-1)});
        }
    });
}

$('#save_but').click(function(){
    $.ajax({
        url:'../ajax/saveYearPays',
        type:'POST',
        data:$('#pay_form').serialize(),
        success: function(data){
            show('all',4,1);
        }
    });
});

})})(jQuery)