<form action="<?php echo base_url(); ?>index.php/auth/adduser" method="post" id="reg_form">
	<div class="row">
		<div class="col-md-1">
			
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="last_name">Фамилия</label>
				<input type="text" id="last_name" class="form-control" name="last_name">
			</div>
			<div class="form-group">
				<label for="first_name">Имя</label>
				<input type="text" id="first_name" class="form-control" name="first_name">
			</div>
			<div class="form-group">
				<label for="father_name">Отчество</label>
				<input type="text" id="father_name" class="form-control" name="father_name">
			</div>
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" id="email" class="form-control" name="email">
			</div>
			<div class="form-group">
				<label for="phone">Телефон</label>
				<input type="text" class="form-control" name="phone" id="phone">
			</div>
			<div class="form-group">
				<label for="pass1">Пароль</label>
				<input type="password" id="pass1" class="form-control" name="pass1">
			</div>
			<div class="form-group">
				<label for="pass2">Подтверждение пароля</label>
				<input type="password" id="pass2" class="form-control"  name="pass2">
			</div>
			<input type="submit" class="btn btn-default" name="adduser" id="adduser" value="Зарегистрироваться">
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label><input type="checkbox" name="dancer">Танцор</label>
			</div>
			<div class="form-group">
				<label class="form-group"><input type="checkbox" name="trainer">Тренер</label>
			</div>
			<div class="form-group">
				<label class="form-group"><input type="checkbox" name="cluber" >Руководитель клуба</label>
			</div>
			<div class="form-group">
				<label class="form-group"><input type="checkbox" name="organizer">Организатор конкурсов</label>
			</div>
		</div>
	</div>
</form>
<script src="<?php echo base_url(); ?>/js/register_user.js"></script>