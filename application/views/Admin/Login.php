<?php include('header.php'); ?>
<div class="container" style="margin-top: 20px">
	<?php if($error = $this->session->flashdata('user_success')) :?>
	<div class="row">
		<div class="col-lg-6">
			<div class ="alert alert-success">
				<?php echo $error; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($error = $this->session->flashdata('Login_failed')) :?>
	<div class="row">
		<div class="col-lg-6">
			<div class ="alert alert-danger">
				<?php echo $error; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php echo form_open('login'); ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="username">User Name:</label>
				<?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Username', 'name' => 'uname' ,
				'value' => set_value('uname') ]); ?>
				<div class="col-lg-6">
					<?php echo form_error('uname'  ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="email">Password:</label>
				<?php echo form_password(['class' => 'form-control', 'placeholder' => 'Enter Password', 'id' => 'pwd', 'name' => 'pass',
				'value' => set_value('pass')]); ?>
				<div class="col-lg-6">
					<?php echo form_error('pass'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-success', 'value' => 'Submit']) ?>
	<?php echo form_reset(['type' => 'reset', 'class' => 'btn btn-primary', 'value' => 'Reset']) ?>
	<?php echo anchor('register/' , 'Sign Up?' , 'class = "link-class"') ?>
</div>
<?php include('footer.php'); ?>