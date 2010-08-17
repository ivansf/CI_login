<?php $this->load->view('header'); ?>

<h1>Please Login</h1>

<?php echo form_open('user/validate_json'); ?>

<input type="text" name="username" value="" size="20" /><br>
<input type="text" name="password" value="" size="20" /><br>
<input type="submit" value="Login" id="submit_login" />

<?php echo form_close(); ?>

<?php echo anchor('user/register', 'Create a new account'); ?>

<?php $this->load->view('footer'); ?>
