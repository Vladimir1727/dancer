(function($){$(function(){

roles_click();

function roles_click(){
	$('#dancer_add').click(function(){add_role('dancer')});
	$('#dancer_del').click(function(){del_role('dancer')});

	$('#trainer_add').click(function(){
		add_role('trainer');
	});
	$('#trainer_del').click(function(){
		del_role('trainer');
	});

	$('#organizer_add').click(function(){
		add_role('organizer');
	});
	$('#organizer_del').click(function(){
		del_role('organizer');
	});

	$('#cluber_add').click(function(){
		add_role('cluber');
	});
	$('#cluber_del').click(function(){
		del_role('cluber');
	});
}

function del_role(role) {
	$.ajax({
		url:'../../ajax/delRole',
		type:'POST',
		data:'role='+role,
		success: function(data){
			get_roles();
		}
	})
}

function add_role(role) {
	$.ajax({
		url:'../../ajax/addRole',
		type:'POST',
		data:'role='+role,
		success: function(data){
			get_roles();
		}
	})
}



function get_roles(){
	$.ajax({
		url:'../../ajax/getRoles',
		type:'POST',
		success: function(data){
			var roles=JSON.parse(data);
			switch (roles.dancer){
				case 0:
				$('#dancer_status').text('нет');
				$('#dancer_action').html('<button class="btn btn-success" id="dancer_add">запросить</button>');
				break;
				case 1:
				$('#dancer_status').text('запрошена');
				$('#dancer_action').html('<button class="btn btn-danger" id="dancer_del">удалить</button>');
				break;
				case 2:
				$('#dancer_status').text('активна');
				$('#dancer_action').html('<button class="btn btn-danger" id="dancer_del">удалить</button>');
				break;
				case 3:
				$('#dancer_status').text('заблокировано Администратором');
				break;
			}
			switch (roles.trainer){
				case 0:
				$('#trainer_status').text('нет');
				$('#trainer_action').html('<button class="btn btn-success" id="trainer_add">запросить</button>');
				break;
				case 1:
				$('#trainer_status').text('запрошена');
				$('#trainer_action').html('<button class="btn btn-danger" id="trainer_del">удалить</button>');
				break;
				case 2:
				$('#trainer_status').text('активна');
				$('#trainer_action').html('<button class="btn btn-danger" id="trainer_del">удалить</button>');
				break;
				case 3:
				$('#trainer_status').text('заблокировано Администратором');
				break;
			}
			switch (roles.cluber){
				case 0:
				$('#cluber_status').text('нет');
				$('#cluber_action').html('<button class="btn btn-success" id="cluber_add">запросить</button>');
				break;
				case 1:
				$('#cluber_status').text('запрошена');
				$('#cluber_action').html('<button class="btn btn-danger" id="cluber_del">удалить</button>');
				break;
				case 2:
				$('#cluber_status').text('активна');
				$('#cluber_action').html('<button class="btn btn-danger" id="cluber_del">удалить</button>');
				break;
				case 3:
				$('#cluber_status').text('заблокировано Администратором');
				break;
			}
			switch (roles.orgaizer){
				case 0:
				$('#orgaizer_status').text('нет');
				$('#orgaizer_action').html('<button class="btn btn-success" id="orgaizer_add">запросить</button>');
				break;
				case 1:
				$('#orgaizer_status').text('запрошена');
				$('#orgaizer_action').html('<button class="btn btn-danger" id="orgaizer_del">удалить</button>');
				break;
				case 2:
				$('#orgaizer_status').text('активна');
				$('#orgaizer_action').html('<button class="btn btn-danger" id="orgaizer_del">удалить</button>');
				break;
				case 3:
				$('#orgaizer_status').text('заблокировано Администратором');
				break;
			}
			switch (roles.admin){
				case 0:
					$('#admin_status').text('нет');
				break;
				case 1:
					$('#admin_status').text('запрошена');
				break;
				case 2:
					$('#admin_status').text('активна');
				break;
				case 3:
					$('#admin_status').text('заблокировано Администратором');
				break;
			}

		roles_click();
		}
	})	
}

function show(){
    $.ajax({
        url:'../../ajax/IUser',
        type:'POST',
        success: function(data){
                var user=JSON.parse(data);
                $('#name').html(user.last_name+' '+user.first_name+' '+user.father_name);
                $('#phone').html(user.phone);
                $('#email').html(user.email);
        }
    })
}

$('#edit_but').click(function(){
    $.ajax({
        url:'../../ajax/IUser',
        type:'POST',
        success: function(data){
                var user=JSON.parse(data);
                $('#e_last_name').val(user.last_name);
                $('#e_first_name').val(user.first_name);
                $('#e_father_name').val(user.father_name);
                $('#e_password').val(user.password);
                $('#e_phone').val(user.phone);
                $('#e_email').val(user.email);
                $('#e_id').val(user.id);
        }
    })
});

$('#savemodal').click(function(){
    var data=$('#edit_form').serializeArray();
    $.ajax({
        url:'../../ajax/saveUser',
        type:'POST',
        data:data,
        success: function(data){
            console.log(data);
            show();
        }
    });
});

})})(jQuery)