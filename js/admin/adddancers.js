(function($){$(function(){
$('#main_block').hide();
$('#trainer_select').hide();

$('#club_select').change(function(){
    var club=$('#club_select').val();
    if(club == 0){
        $('#main_block').hide();
        $('#trainer_select').hide();
    }
    else{
        $.ajax({
            url:'../../ajax/selectTrainers',
            type:'POST',
            data:'id='+club,
            success: function(data){
                $('#trainer_select').html(data);
                $('#trainer_select').show();
            }
        });
    } 
});

$('#trainer_select').change(function(){
    var trainer=$('#trainer_select').val();
    if(trainer == 0){
        $('#main_block').hide();
    }
    else{
        $('#trainer_id').val(trainer);
        $.ajax({
            url:'../../ajax/selectDancers',
            type:'POST',
            data:'id='+trainer,
            success: function(data){
                //console.log(data);
                $('#main_table tbody').html(data);
                $('#main_block').show();
            }
        });
    } 
});

})})(jQuery)