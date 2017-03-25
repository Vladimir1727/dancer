(function($){$(function(){
addClick();

$('#new_but').click(function(){
   $('#n_name').val('');
   $('#n_comment').val('');
   $('#n_date_reg_open').val('');
   $('#n_date_reg_close').val('');
   $('#n_date_open').val('');
   $('#n_date_close').val('');
   $('#n_city').html('');
   $('#n_ogr').html('');
   $('#n_pay_iude').val('');
   $('#n_pay_other').val('');
   $('#n_pay_not').val('');
   $('#n_regions option').removeAttr('selected');
   $('#n_ways option').removeAttr('selected');
   $('#city_block').hide();
   $('#org_block').hide();
});

$('#n_regions').change(function(){
    $.ajax({
        url:'../ajax/getCitiesHtml',
        type:'POST',
        data:'region='+$('#n_regions').val(),
        success: function(data){
            $('#n_city').html(data);
            $('#city_block').show();
        }
    });
});

$('#n_city').change(function(){
    $.ajax({
        url:'../ajax/selectOrg',
        type:'POST',
        data:'city='+$('#n_city').val(),
        success: function(data){
            $('#n_org').html(data);
            $('#org_block').show();
        }
    });
});

$('#e_regions').change(function(){
    $.ajax({
        url:'../ajax/getCitiesHtml',
        type:'POST',
        data:'region='+$('#e_regions').val(),
        success: function(data){
            $('#e_city').html(data);
        }
    });
});

$('#e_city').change(function(){
    $.ajax({
        url:'../ajax/selectOrg',
        type:'POST',
        data:'city='+$('#e_city').val(),
        success: function(data){
            $('#e_org').html(data);
        }
    });
});

$('#addmodal').click(function(){
   $.ajax({
        url:'../ajax/addCompetition',
        type:'POST',
        data:$('#add_form').serialize(),
        success: function(data){
            show();
        }
    });
});

$('#savemodal').click(function(){
    $.ajax({
        url:'../ajax/updateCompetition',
        type:'POST',
        data:$('#edit_form').serialize(),
        success: function(data){
            console.log(data);
            show();
        }
    });
});

function addClick(){
    $('.info').each(function(){//кнопка информация
	$(this).click(function(){
            var id=$(this).attr('id').substr(1);
            $.ajax({
		url:'../ajax/compInfo',
		type:'POST',
		data:'id='+id,
		success: function(data){
                    var modal = JSON.parse(data);
                    $('#i_name').text(modal.name);
                    $('#i_city').text(modal.city);
                    $('#i_comment').text(modal.comment);
                    $('#i_way').text(modal.way);
                    $('#i_org').text(modal.last_name+' '+modal.first_name+' '+modal.father_name);
                    $('#i_contact').text(modal.email+' '+modal.phone);
                    $('#i_reg').text('с '+modal.date_reg_open+' по '+modal.date_reg_close);
                    $('#i_date').text('с '+modal.date_open+' по '+modal.date_close);
                    $('#i_status').text(modal.status);
                    $('#i_pay_iude').text(modal.pay_iude);
                    $('#i_pay_other').text(modal.pay_other);
                    $('#i_pay_not').text(modal.pay_not);
		}
            });
	});
    });
    $('.edit').each(function(){//кнопка редактировать
	$(this).click(function(){
            var id=$(this).attr('id').substr(1);
            $('#e_id').val(id);
            $.ajax({
		url:'../ajax/compInfo',
		type:'POST',
		data:'id='+id,
		success: function(data){
                var modal=JSON.parse(data);
                    $('#e_name').val(modal.name);
                    $('#e_comment').val(modal.comment);
                    $('#e_date_reg_open').val(modal.date_reg_open);
                    $('#e_date_reg_close').val(modal.date_reg_close);
                    $('#e_date_open').val(modal.date_open);
                    $('#e_date_close').val(modal.date_close);
                    $('#e_pay_iude').val(modal.pay_iude);
                    $('#e_pay_other').val(modal.pay_other);
                    $('#e_pay_not').val(modal.pay_not);
                    $('#e_regions option').each(function(){
                        if ($(this).val() == modal.region_id){
                            $(this).attr('selected','selected');
                        }else{
                            $(this).removeAttr('selected');
                        }
                    });
                    $('#e_status option').each(function(){
                        if ($(this).val() == modal.status_id){
                            $(this).attr('selected','selected');
                        }else{
                            $(this).removeAttr('selected');
                        }
                    });
                    $('#e_way option').each(function(){
                        if ($(this).val() == modal.way_id){
                            $(this).attr('selected','selected');
                        }else{
                            $(this).removeAttr('selected');
                        }
                    });
                    $.ajax({
                        url:'../ajax/getCitiesHtml',
                        type:'POST',
                        data:'region='+modal.region_id,
                        success: function(cities){
                            $('#e_city').html(cities);
                            $('#e_city option').each(function(){
                                if ($(this).val() == modal.city_id){
                                    $(this).attr('selected','selected');
                                }else{
                                    $(this).removeAttr('selected');
                                }
                            });
                            $.ajax({
                                url:'../ajax/selectOrg',
                                type:'POST',
                                data:'city='+modal.city_id,
                                success: function(org){
                                    $('#e_org').html(org);
                                    $('#e_org option').each(function(){
                                    if ($(this).val() == modal.org_id){
                                            $(this).attr('selected','selected');
                                        }else{
                                            $(this).removeAttr('selected');
                                        }
                                    });
                                }
                            });
                        }
                    });

                }
            });
	});
    });

}

function show(){
    $.ajax({
	url:'../ajax/showCompetitions',
	type:'POST',
        data:'role=admin',
        success: function(data){
            $('#main_table tbody').html(data);
            addClick();
        }
    });
}


})})(jQuery)