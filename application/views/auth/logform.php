<p class="bg-danger"><?php echo (isset($error)) ? $error:''; ?></p>
<form action="<?php echo base_url(); ?>index.php/auth/enter" method="post" id="reg_form">
	<div class="form-group">
		<label for="email">E-mail</label>
		<input type="email" id="email" class="form-control" name="email" value="<?php echo (isset($email)) ? $email:''; ?>">
	</div>
	<div>
		<label for="pass">Пароль</label>
		<input type="password" id="pass" class="form-control" name="pass" value="<?php echo (isset($password)) ? $password:''; ?>">
	</div>
	<input type="submit" class="btn btn-default" name="login_but" id="login_but" value="Войти">
</form>
<script src="<?php echo base_url(); ?>/js/login.js"></script>