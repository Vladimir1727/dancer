<?php $this->load->view('header');?>
<h1 class="h4 text-success">Администрирование пользователей</h1>
	<?php $this->load->view('admin/menu');?>
	<div class="row">
		<div class="col-md-2">
			<form id="filter_form">
				<h4>Фильтр</h4>
				<div class="form-group">
					<label for="filter_admin">Админ</label>
						<select name="filter_admin" id="filter_admin" class="form-control">
							<option value="-1">не важно</option>
							<option value="0">нет</option>
							<option value="1">запрошен</option>
							<option value="2">активен</option>
							<option value="3">блокирован</option>
						</select>
				</div>
				<div class="form-group">
					<label for="filter_organizer">Организатор</label>
						<select name="filter_organizer" id="filter_organizer"  class="form-control">
							<option value="-1">не важно</option>
							<option value="0">нет</option>
							<option value="1">запрошен</option>
							<option value="2">активен</option>
							<option value="3">блокирован</option>
						</select>
				</div>
				<div class="form-group">
					<label for="filter_cluber">Руководитель клуба</label>
						<select name="filter_cluber" id="filter_cluber"  class="form-control">
							<option value="-1">не важно</option>
							<option value="0">нет</option>
							<option value="1">запрошен</option>
							<option value="2">активен</option>
							<option value="3">блокирован</option>
						</select>
				</div>
				<div class="form-group">
					<label for="filter_trainer">Тренер</label>
						<select name="filter_trainer" id="filter_trainer"  class="form-control">
							<option value="-1">не важно</option>
							<option value="0">нет</option>
							<option value="1">запрошен</option>
							<option value="2">активен</option>
							<option value="3">блокирован</option>
						</select>
				</div>
				<div class="form-group">
					<label for="filter_dancer">Танцор</label>
						<select name="filter_dancer" id="filter_dancer"  class="form-control">
							<option value="-1">не важно</option>
							<option value="0">нет</option>
							<option value="1">запрошен</option>
							<option value="2">активен</option>
							<option value="3">блокирован</option>
						</select>
				</div>
				<div class="form-group">
					<label for="filter_text">Строка поиска</label>
					<input type="text" class="form-control" name="filter_text" id="filter_text">
				</div>
				<input type="submit" value="НАЙТИ" class="btn btn-info" id='filter_but'>
			</form>
		</div>
		<div class="col-md-3">
			<table class="table table-striped" id="user_table">
			  <tbody>
				<?php 
				foreach ($users as $user) {
					echo '<tr>';
					echo '<td class="hidden">'.$user['id'].'</td>';
					echo '<td class="pointer">'.$user['last_name'].' '.$user['first_name'].' '.$user['father_name'].'</td>';
					echo '</tr>';
				}
			echo $this->pagination->create_links();
			 ?>
			 </tbody>
			</table>
		</div>
		<div class="col-md-3" id="user_info">

		</div>
		<div class="col-md-3">
			<form id="user_form">
				<input type="submit" id="edit_but" class='btn btn-warning' value="модерация">
				<div id="edit_block">
					<input type="hidden" id="user_id" name="id" class="form-control">
					<input type="text" id="last_name" name="last_name" placeholder="фамилия..." class="form-control">
					<input type="text" id="first_name" name="first_name" placeholder="имя..." class="form-control">
					<input type="text" id="father_name" name="father_name" placeholder="отчество..." class="form-control">
					<input type="text" id="phone" name="phone" placeholder="телефон..." class="form-control">
					<input type="text" id="password" name="password" placeholder="пароль..." class="form-control">
					<input type="text" id="email" name="email" placeholder="e-mail.." class="form-control">
					
					<h4>Администратор</h4>
					<div class="radio">
						<label>
							<input type="radio" name="admin" value="0">нет
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="admin" value="1">запрошено
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="admin" value="2">активен
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="admin" value="3">блокирован
						</label>
					</div>
					
					<h4>Организатор</h4>
					<div class="radio">
						<label>
							<input type="radio" name="organizer" value="0">нет
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="organizer" value="1">запрошено
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="organizer" value="2">активен
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="organizer" value="3">блокирован
						</label>
					</div>

					<h4>Руководитель клуба</h4>
					<div class="radio">
						<label>
							<input type="radio" name="cluber" value="0">нет
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="cluber" value="1">запрошено
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="cluber" value="2">активен
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="cluber" value="3">блокирован
						</label>
					</div>

					<h4>Тренер</h4>
					<div class="radio">
						<label>
							<input type="radio" name="trainer" value="0">нет
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="trainer" value="1">запрошено
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="trainer" value="2">активен
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="trainer" value="3">блокирован
						</label>
					</div>

					<h4>Танцор</h4>
					<div class="radio">
						<label>
							<input type="radio" name="dancer" value="0">нет
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="dancer" value="1">запрошено
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="dancer" value="2">активен
						</label>
					</div>
					<div class="radio">
						<label>
							<input type="radio" name="dancer" value="3">блокирован
						</label>
					</div>

					<input type="submit" id="save_but" class='btn btn-success'  value="сохранить">
				</div>
			</form>
			
		</div>
			
	</div>
<?php 

$this->load->view('footer'); ?>
<script src="<?php echo base_url(); ?>/js/admin_users.js"></script>