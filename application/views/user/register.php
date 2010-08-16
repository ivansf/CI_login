<?php $this->load->view('header'); ?>

	<h1>Register now</h1>
	<?php if(isset($error)) echo $error; ?>
	<?php echo form_open('user/register_validate'); ?>
	<label for="username">Username</label><input type="text" name="username" value="" id="username"/>
	<label for="email">Email</label><input type="text" name="email" value="" id="email"/>
	<label for="password">Password</label><input type="password" name="password" value="" id="password"/>
	<label for="password2">Confirm Password</label><input type="password" name="password2" value="" id="password2"/>
	<input type="submit" name="submit_register" value="Register" id="submit_register"/>
	<?php echo form_close(); ?>

<?php $this->load->view('footer'); ?>