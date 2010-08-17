<?php $this->load->view('header'); ?>

	<h1>Register now</h1>
	<?php if(isset($error)) echo $error; ?>
	
	
	<?php echo form_open('user/register'); ?>
	<div class="form_item">
		<label for="username">Username</label>
		<input type="text" name="username" value="<?php echo set_value('username'); ?>" id="username"/>
		<?php echo form_error('username'); ?>
	</div>
	
	<div class="form_item">
		<label for="email">Email</label>
		<input type="text" name="email" value="<?php echo set_value('email'); ?>" id="email"/>
		<?php echo form_error('email'); ?>
	</div>
	
	<div class="form_item">
		<label for="password">Password</label>
		<input type="password" name="password" value="<?php echo set_value('password'); ?>" id="password"/>
		<?php echo form_error('password'); ?>
	</div>
	
	<div class="form_item">
		<label for="password2">Confirm Password</label>
		<input type="password" name="password2" value="<?php echo set_value('password2'); ?>" id="password2"/>
	</div>
	
	<input type="submit" name="submit_register" value="Register" id="submit_register"/>
	<?php echo form_close(); ?>

<?php $this->load->view('footer'); ?>