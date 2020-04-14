<?php include('header.php'); ?>

<div class="container" style="margin-top: 20px">
	<?php echo form_open('admin/index'); ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="username">User Name:</label>
				<?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Username', 'name' => 'uname']); ?>
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
				<?php echo form_password(['class' => 'form-control', 'placeholder' => 'Enter Password', 'id' => 'pwd', 'name' => 'pass']); ?>
				<div class="col-lg-6">
					<?php echo form_error('pass'); ?>

				</div>
			</div>

		</div>
	</div>


	<?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-success', 'value' => 'Submit']) ?>
	<?php echo form_reset(['type' => 'reset', 'class' => 'btn btn-primary', 'value' => 'Reset']) ?>
</div>


<?php include('footer.php'); ?>
