(function($){$(function(){

$('#savemodal').click(function(){
    var data=$('#formmodal').serializeArray();
    $.ajax({
        url:'../../ajax/saveDancer',
        type:'POST',
        data:data,
        success: function(data){
            console.log(data);
            show();
        }
    });
});

$('#edit_but').click(function(){
    $.ajax({
        url:'../../ajax/dancerInfo',
        type:'POST',
        data:'id='+$('#dancer_id').val(),
        success: function(data){

            var modal=JSON.parse(data);
                    $('#e_first_name').val(modal.first_name);
                    $('#e_last_name').val(modal.last_name);
                    $('#e_father_name').val(modal.father_name);
                    $('#e_password').val(modal.password);
                    $('#e_email').val(modal.email);
                    $('#e_phone').val(modal.phone);
                    $('#e_id').val(modal.id);
                    $('#e_user_id').val(modal.user_id);
        }
    });
});

show();

function show(){
     $.ajax({
        url:'../../ajax/dancerInfo',
        type:'POST',
        data:'id='+$('#dancer_id').val(),
        success: function(data){
            var modal=JSON.parse(data);
                    var name=modal.last_name+' '+modal.first_name+' '+modal.father_name;
                    $('#name').html(name);
                    $('#email').html(modal.email);
                    $('#phone').html(modal.phone);
                    $('#birthdate').html(modal.birthdate);
        }
    });
}


})})(jQuery)