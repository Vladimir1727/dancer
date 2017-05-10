(function($){$(function(){

$('#add_but').click(function(){
   var list = [];
   $('.sum_cat').each(function(){
       if ($(this).prop("checked")){
           var lig=$(this).parent().find('input[name|="lig_id"]').val();
           var style=$(this).parent().find('input[name|="style_id"]').val();
           var age=$(this).parent().find('input[name|="age_id"]').val();
           var count=$(this).parent().find('input[name|="count_id"]').val();
           list.push({
               'lig_id':lig,
               'style_id':style,
               'age_id':age,
               'count_id':count
           });
       }
   })
   var dancers=$('#dancers_form').serializeArray();
   var competition=$('#comp_form').serializeArray();
   var data={
       'dancers':dancers,
       'cats':list,
       'competition':competition
   }
   $.ajax({
        url:'../ajax/addSummCats',
        type:'POST',
        data:data,
        success: function(data){
            show();
        }
    });
    $('.sum_cat').each(function(){
       $(this).removeAttr('checked');
    });
});

show();

function show(){
    $.ajax({
        url:'../ajax/getCompListCluber',
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
                url:'../ajax/delPart',
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