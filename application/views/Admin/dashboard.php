<?php include('header.php'); ?>
<div class="container" style="margin-top: 50px;">
	<?php if($error = $this->session->flashdata('insert_success')) :?>
	<div class="row">
		<div class="col-lg-6">
			<div class ="alert alert-success">
				<?php echo $error; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($error = $this->session->flashdata('delete_success')) :?>
	<div class="row">
		<div class="col-lg-6">
			<div class ="alert alert-success">
				<?php echo $error; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($error = $this->session->flashdata('delete_failed')) :?>
	<div class="row">
		<div class="col-lg-6">
			<div class ="alert alert-danger">
				<?php echo $error; ?>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<div class="row">
		<!-- <a href="adduser" class="btn btn-lg btn-primary">Add Articles</a> -->
		<?= anchor('admin/adduser' , 'Add Articles' , ['class' => 'btn btn-lg btn-primary']) ?>
	</div>
</div>
<div class="container" style="margin-top: 50px;">
	<div class="table">
		<!-- <?php echo $this->db->last_query(); ?> -->
		
		
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Sr no.</th>
					<th>Article Title</th>
					<th>Article Description</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($articles) && count($articles)) : 
				$count = $this->uri->segment(3);?>
				<?php foreach ($articles as $art) : 
					
					?>
				<tr>
					<td><?= ++$count; ?></td>
					<td><?php echo $art->article_title ?></td>
					<td><?php echo $art->article_body ?></td>
					<td>
						<?=
						form_open('admin/edituser/'.$art->id),
						form_hidden('id' , $art->id),
						form_submit(['name'=>'submit' , 'value'=>'Edit','class'=>'btn btn-primary']),
						form_close();
						?>		
					</td>
					<td>
						<?=
						form_open('admin/delarticle'),
						form_hidden('id' , $art->id),
						form_submit(['name'=>'submit' , 'value'=>'Delete','class'=>'btn btn-danger']),
						form_close();
						?>
					</td>
					<!-- <a href="" class = "btn btn-danger">Delete</a>-->
				</tr>
				<?php endforeach; ?>
				<?php else : ?>
				<tr>
					<td colspan="3">No data available</td>
				</tr>
				<?php endif; ?>
				
			</tbody>
		</table>
		<!-- <ul class="pagination">
			<li class="page-item"><a class="page-link" href=""><</a></li>
			<li class="page-item"><a class="page-link" href="">1</a></li>
			<li class="page-item"><a class="page-link" href="">2</a></li>
			<li class="page-item"><a class="page-link" href="">3</a></li>
			<li class="page-item"><a class="page-link" href="" class="active">4</a></li>
			<li class="page-item"><a class="page-link" href="">5</a></li>
			<li class="page-item"><a class="page-link" href="">></a></li>
		</ul> -->
		<?php echo $this->pagination->create_links();?>
	</div>
</div>
<?php include('footer.php'); ?>