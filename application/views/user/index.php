<?php $this->load->view('header');?>
<div id="editmodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Редактирование</h4>
            </div>
            <div class="modal-body">
                <form id="edit_form">
                    <input type="hidden" id="e_id" name="id">
                    <div class="form-group">
                        <label>
                            Фамилия
                            <input type="text" id="e_last_name" name="last_name" placeholder="фамилия..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Имя
                            <input type="text" id="e_first_name" name="first_name" placeholder="имя..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Отчество
                            <input type="text" id="e_father_name" name="father_name" placeholder="отчество..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Пароль
                            <input type="text" id="e_password" name="password" placeholder="пароль..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            E-mail
                            <input type="email" id="e_email" name="email" placeholder="e-mail..." class="form-control input-sm">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>
                            Телефон
                            <input type="text" id="e_phone" name="phone" placeholder="телефон..." class="form-control input-sm">
                        </label>
                    </div>
                   
                </form>
            </div>
            <br>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal" id="savemodal">СОХРАНИТЬ</button>
            </div>
        </div>
    </div>
</div>
<!-- End Modal -->

<h1 class="h1 text-success">Кабинет пользователя</h1>
	<div class="row">
		<div class="col-md-3">
                     <p>
                        <strong>Мои:</strong>
                        <span id="name"><?php echo $user->last_name.' '.$user->first_name.' '.$user->father_name;?></span>
                    </p>
                    <p>
                        E-mail: 
                        <span id="email"><?php echo $user->email;?></span>
                    </p>
                    <p>
                        Телефон: 
                        <span id="phone"><?php echo $user->phone;?></span>
                    </p>
                    <input type="hidden" id="id" name="id" value="<?php echo $user->id; ?>">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#editmodal" id="edit_but">
                        Изменить
                    </button>
		</div>
		<div class="col-md-2">
			<?php 
			echo '<p>Имя: <strong>'.$_SESSION['name'].'</strong></p>';
			echo '<p>Email: '.$_SESSION['email'].'</p>';
			 ?>
		</div>
		
		<div class="col-md-6">
			<table class="table">
				<tbody>
					<tr>
						<td>Танцор</td>
						<td id="dancer_status">
							<?php 
							if($_SESSION['dancer']==0) echo "нет";
							if($_SESSION['dancer']==1) echo "запрошена";
							if($_SESSION['dancer']==2) echo "активна";
							if($_SESSION['dancer']==3) echo "отказ Администратора";
							 ?>
						</td>
						<td id="dancer_action">
						<?php
							if ($_SESSION['dancer']==0)
								echo '<button class="btn btn-success" id="dancer_add">запросить</button>';
							elseif($_SESSION['dancer']!=3)
								echo '<button class="btn btn-danger" id="dancer_del">удалить</button>';

						?>
						</td>
					</tr>
					<tr>
						<td>Тренер</td>
						<td id="trainer_status">
							<?php 
							if($_SESSION['trainer']==0) echo "нет";
							if($_SESSION['trainer']==1) echo "запрошена";
							if($_SESSION['trainer']==2) echo "активна";
							if($_SESSION['trainer']==3) echo "отказ Администратора";
							 ?>
						</td>
						<td  id="trainer_action">
							<?php
							if ($_SESSION['trainer']==0) 
								echo '<button class="btn btn-success" id="trainer_add">запросить</button>';
							elseif($_SESSION['trainer']!=3)
								echo '<button class="btn btn-danger" id="trainer_del">удалить</button>';
							?>
						</td>
					</tr>
					<tr>
						<td>Руководитель клуба</td>
						<td id="cluber_status">
							<?php 
							if($_SESSION['cluber']==0) echo "нет";
							if($_SESSION['cluber']==1) echo "запрошена";
							if($_SESSION['cluber']==2) echo "активна";
							if($_SESSION['cluber']==3) echo "отказ Администратора";
							 ?>
						</td>
						<td id="cluber_action">
							<?php
							if ($_SESSION['cluber']==0) 
								echo '<button class="btn btn-success" id="cluber_add">запросить</button>';
							elseif($_SESSION['cluber']!=3)
								echo '<button class="btn btn-danger" id="cluber_del">удалить</button>';
						?>
						</td>
					</tr>
					<tr>
						<td>Организатор</td>
						<td id="organizer_status">
							<?php 
							if($_SESSION['organizer']==0) echo "нет";
							if($_SESSION['organizer']==1) echo "запрошена";
							if($_SESSION['organizer']==2) echo "активна";
							if($_SESSION['organizer']==3) echo "отказ Администратора";
							 ?>
						</td>
						<td  id="organizer_action">
							<?php
							if ($_SESSION['organizer']==0) 
								echo '<button class="btn btn-success" id="organizer_add">запросить</button>';
							elseif($_SESSION['organizer']!=3)
								echo '<button class="btn btn-danger" id="organizer_del">удалить</button>';
						?>
						</td>
					</tr>
					<tr>
						<td>Администратор</td>
						<td id="admin_status">
							<?php 
							if($_SESSION['admin']==0) echo "нет";
							if($_SESSION['admin']==1) echo "запрошена";
							if($_SESSION['admin']==2) echo "активна";
							if($_SESSION['admin']==3) echo "отказ Администратора";
							 ?>
						</td>
						<td>
						</td>
					</tr>
				</tbody>
				<thead>
					<tr>
						<th>Роль</th>
						<th>Статус роли</th>
						<th>Действия</th>
					</tr>
				</thead>
			</table>
			
		</div>
	</div>
<script src="<?php echo base_url(); ?>/js/usercabinet_index.js"></script>
<?php $this->load->view('footer'); ?>