<!doctype html>
<html lang="en">
<head>
	<!--<link rel="stylesheet" href="<?/*= base_url("Assets/css/bootstrap.min.css") */?>">-->

	<?=  link_tag("Assets/css/bootstrap.min.css")?>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Admin Panel</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
	<a class="navbar-brand" href="#">Admin Panel</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
	</button>

	<?php 
		if($this->session->userdata('id'))
		{
	?>

	<li><a href="<?= base_url('admin/logout');?>" class="btn btn-danger" style="">Logout</a></li>

	<?php

}
?>

</nav>
<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>-->
<script src="<?= base_url("Assets/js/bootstrap.js")?>"></script>

</body>
</html>
