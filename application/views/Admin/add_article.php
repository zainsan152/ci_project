<?php include('header.php'); ?>
<div class="container" style="margin-top: 20px">
	<?php if($error = $this->session->flashdata('insert_failed')) :?>
			<div class="row">
				<div class="col-lg-6">
					<div class ="alert alert-danger">
						<?php echo $error; ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	<h1>Add Articles</h1>
	<?php echo form_hidden('user_id' , $this->session->userdata('id')); ?>
	
	<?php echo form_open('admin/userValidation'); ?>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="Title">Article Title:</label>
				<?php echo form_input(['class' => 'form-control', 'placeholder' => 'Enter Title', 'name' => 'article_title' ,
				'value' => set_value('article_title') ]); ?>
				<div class="col-lg-6">
					<?php echo form_error('article_title' ); ?>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="body">Article Body:</label>
				<?php echo form_textarea(['class' => 'form-control', 'placeholder' => 'Enter Body', 'id' => 'body', 'name' => 'article_body',
				'value' => set_value('article_body')]); ?>
				<div class="col-lg-6">
					<?php echo form_error('article_body'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php echo form_submit(['type' => 'submit', 'class' => 'btn btn-success', 'value' => 'Submit']) ?>
	<?php echo form_reset(['type' => 'reset', 'class' => 'btn btn-primary', 'value' => 'Reset']) ?>
	<?php echo anchor('register/' , 'Sign Up?' , 'class = "link-class"') ?>
</div>
<?php include('footer.php'); ?>