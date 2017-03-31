(function($){$(function(){
$('#main_table').hide();
$('#success').hide();
$('#upload').click(function(){
    $('#file').trigger('click');
});

$('#file').on('change',function(){
    var files = this.files;
    var fdata = new FormData();
    fdata.append('comp_id',$('#comp_id').val());
    $.each( files, function( key, value ){
        fdata.append( key, value);
    });
    $.ajax({
        url:'../../ajax/uploadResult',
        type:'POST',
        data:fdata,
        processData: false, 
        contentType: false, 
        success: function(data){
            if (data == ''){
                $('#success').show();
                $('#main_table').hide();
            }
            else{
                $('#success').hide();
                $('#main_table').show();
                $('#main_table tbody').html(data);
            }
            show();
        }
    });
});

function show(){
    $.ajax({
        url:'../../ajax/getResultHtml',
        type:'POST',
        data:'comp_id='+$('#comp_id').val(),
        success: function(data){
            $('#list').html(data);
        }
    });
}

})})(jQuery)