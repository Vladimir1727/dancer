(function($){$(function(){

$('#edit_block').hide();
$('#edit_but').hide();

$('#edit_but').click(function(){
	$('#edit_block').show();
	$('#edit_but').hide();
	return false;
});

$('#save_but').click(function(){
	var form=$('#user_form').serialize();
	$.ajax({
		url:'../ajax/saveUser',
		type:'POST',
		data:form,
		success: function(data){

		}
	});
	return false;
});

$('#filter_but').click(function(){
	var form=$('#filter_form').serialize();
	$.ajax({
		url:'../ajax/filterUser',
		type:'POST',
		data:form,
		success: function(data){
			var users=JSON.parse(data);
			var table='';
			for (var i = 0; i < users.length; i++) {
				table+='<tr>';
				table+='<td class="hidden">'+users[i]['id']+'</td>';
				table+='<td class="pointer">'+users[i]['last_name']+' '+users[i]['first_name']+' '+users[i]['father_name']+'</td>';
				table+='</tr>';
			}
			$('#user_table tbody').html(table);
			user_click();
		}
	});

	return false;
});

function user_click(){
    $('td.pointer').each(function(){
        $(this).click(function(){
                var id=$(this).parent().find('td.hidden').text();
                console.log('id=',id);
                $('#edit_block').hide();
                user_info(id);
        });
    });
}

user_click();

function user_info(id){
	$.ajax({
		url:'../ajax/getUserInfo',
		type:'POST',
		data:'id='+id,
		success: function(data){
			$('#edit_but').show();
			var user=JSON.parse(data);
			$('#user_id').val(user.id);
			$('#last_name').val(user.last_name);
			$('#first_name').val(user.first_name);
			$('#father_name').val(user.father_name);
			$('#phone').val(user.phone);
			$('#email').val(user.email);
			$('#password').val(user.password);
			$('#edit_block input[type=radio]').each(function(){
				$(this).prop('checked', false);
			});
			$('#edit_block input[name=admin]').each(function(){
				if (user.admin==$(this).val()) $(this).prop('checked', true);;
			});
			$('#edit_block input[name=organizer]').each(function(){
				if (user.organizer==$(this).val()) $(this).prop('checked', true);;
			});
			$('#edit_block input[name=cluber]').each(function(){
				if (user.cluber==$(this).val()) $(this).prop('checked', true);;
			});
			$('#edit_block input[name=trainer]').each(function(){
				if (user.trainer==$(this).val()) $(this).prop('checked', true);;
			});
			$('#edit_block input[name=dancer]').each(function(){
				if (user.dancer==$(this).val()) $(this).prop('checked', true);;
			});
			var info='';
			info+='<h4>'+user.last_name+' '+user.first_name+' '+user.father_name+'</h4>';
			info+='<p><b>Телефон:</b> '+user.phone+'</p>';
			info+='<p><b>E-mail:</b> '+user.email+'</p>';
			info+='<p><b>Пароль:</b> '+user.password+'</p>';
			info+='<ul>';
			if (user.admin>0){
				info+='<li><b>Администратор</b>';
				if (user.admin==1) info+=' (запроc)';
				if (user.admin==2) info+=' (активен)';
				if (user.admin==3) info+=' (блокирован)';
				info+='</li>';
				}
			if (user.organizer>0){
				info+='<li><b>Организатор</b>';
				if (user.organizer==1) info+=' (запроc)';
				if (user.organizer==2) info+=' (активен)';
				if (user.organizer==3) info+=' (блокирован)';
				info+='</li>';
				}
			if (user.cluber>0){
				info+='<li><b>Руководитель клуба</b>';
				if (user.cluber==1) info+=' (запроc)';
				if (user.cluber==2) info+=' (активен)';
				if (user.cluber==3) info+=' (блокирован)';
				info+='</li>';
				}
			if (user.trainer>0){
				info+='<li><b>Тренер</b>';
				if (user.trainer==1) info+=' (запроc)';
				if (user.trainer==2) info+=' (активен)';
				if (user.trainer==3) info+=' (блокирован)';
				info+='</li>';
				}
			if (user.dancer>0){
				info+='<li><b>Танцор</b>';
				if (user.dancer==1) info+=' (запроc)';
				if (user.dancer==2) info+=' (активен)';
				if (user.dancer==3) info+=' (блокирован)';
				info+='</li>';
				}
			info+='</ul>';
			$('#user_info').html(info);
		}
	})	
}



})})(jQuery)