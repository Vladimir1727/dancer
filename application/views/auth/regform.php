<form action="<?php echo base_url(); ?>index.php/auth/adduser" method="post" id="reg_form">
	<div class="row">
		<div class="col-md-1">
			
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label for="last_name">Фамилия</label>
				<input type="text" id="last_name" class="input_dancer" name="last_name">
			</div>
			<div class="form-group">
				<label for="first_name">Имя</label>
				<input type="text" id="first_name" class="input_dancer" name="first_name">
			</div>
			<div class="form-group">
				<label for="father_name">Отчество</label>
				<input type="text" id="father_name" class="input_dancer" name="father_name">
			</div>
			<div class="form-group">
				<label for="email">E-mail</label>
				<input type="email" id="email" class="input_dancer" name="email">
			</div>
			<div class="form-group">
				<label for="phone">Телефон</label>
				<input type="text" class="input_dancer" name="phone" id="phone">
			</div>
			<div class="form-group">
				<label for="pass1">Пароль</label>
				<input type="password" id="pass1" class="input_dancer" name="pass1">
			</div>
			<div class="form-group">
				<label for="pass2">Подтверждение пароля</label>
				<input type="password" id="pass2" class="input_dancer"  name="pass2">
			</div>
                    <input type="submit" name="adduser" id="adduser" class="btn" value="Зарегистрироваться">
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label><input type="checkbox" name="dancer">Танцор</label>
			</div>
			<div class="form-group">
                            <label class="form-group"><input type="checkbox" name="trainer" class="for_login">Тренер</label>
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